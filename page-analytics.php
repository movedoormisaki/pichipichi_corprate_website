<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ログ可視化 v2</title>

  <!-- Chart.js はこのままCDN利用 -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    .range-controls {
      display: grid;
      gap: 8px;
      grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
      margin: 12px 0 8px;
    }

    .range-controls button,
    .range-controls input[type="date"] {
      padding: 8px;
    }

    .muted {
      opacity: 0.6;
      pointer-events: none;
    }
  </style>

  <script type="module">
    // ======== 追加: 日付フォーマット（ローカルタイムでY-M-D） ========
    const toYMD = (d) => {
      const tz = new Date(d.getTime() - d.getTimezoneOffset() * 60000);
      return tz.toISOString().split("T")[0];
    };

    // ======== 変更: 可変の期間ステート ========
    let currentStartDate = "2025-09-01";
    let currentEndDate = toYMD(new Date());

    // グローバル参照
    let cachedUserIds = [];
    let isLoading = false;

    // ======== 既存：全ユーザーID取得 ========
    const fetchAllUsers = async () => {
      return await fetch(
          "https://fetchallusers-7jkvp5akkq-an.a.run.app/fetchAllUser", {
            method: "POST",
            headers: {
              "Content-Type": "application/json"
            },
            body: JSON.stringify({
              data: {}
            }),
          }
        )
        .then((result) => result.json())
        .then(({
          result
        }) => result.users);
    };

    // ======== 既存：日別集計 ========
    const generateDailyCounts = (logs) => {
      const dailyCounts = {};
      logs.forEach((log) => {
        const dateStr = log.datetime.split("T")[0];
        dailyCounts[dateStr] = (dailyCounts[dateStr] || 0) + 1;
      });
      return dailyCounts;
    };

    // ======== 変更: 期間を引数で受ける ========
    async function fetchLogs(userIds, startDate, endDate) {
      try {
        const userLogsFetches = userIds.map((userId) =>
          fetch(
            "https://fetchanalysislogs-7jkvp5akkq-an.a.run.app/fetchAnalysisLogs", {
              method: "POST",
              headers: {
                "Content-Type": "application/json"
              },
              body: JSON.stringify({
                data: {
                  userId,
                  startDate,
                  endDate
                },
              }),
            }
          )
          .then((result) => result.json())
          .then(({
            result
          }) => ({
            userId,
            displayName: result.displayName || userId,
            logs: result.logs || [],
            dailyCounts: generateDailyCounts(result.logs || []),
          }))
        );
        return await Promise.all(userLogsFetches);
      } catch (error) {
        console.error("❌ データ取得失敗:", error);
        alert("データ取得時にエラーが発生しました。");
        return [];
      }
    }

    // ======== 変更: 現在の期間で配列生成 ========
    function getDateRange(startDate = currentStartDate, endDate = currentEndDate) {
      const start = new Date(startDate);
      const end = new Date(endDate);
      const dates = [];
      for (let d = new Date(start); d <= end; d.setDate(d.getDate() + 1)) {
        dates.push(toYMD(d));
      }
      return dates;
    }

    function renderTable(users) {
      const table = document.getElementById("logTable");
      const dateRange = getDateRange();

      let header = "<tr><th>ユーザー</th>";
      dateRange.forEach((date) => (header += `<th>${date}</th>`));
      header += "</tr>";

      let body = "";
      users.forEach((user) => {
        let row = `<tr><td>${user.displayName}</td>`;
        dateRange.forEach((date) => {
          row += `<td>${user.dailyCounts[date] || 0}</td>`;
        });
        row += "</tr>";
        body += row;
      });

      table.innerHTML = header + body;
    }

    function renderUserSelection(users) {
      const container = document.getElementById("userSelection");
      container.innerHTML = `
          <button id="checkAll">全チェック</button>
          <button id="uncheckAll">全チェック解除</button>
        `;

      users.forEach((user) => {
        const label = document.createElement("label");
        label.style.margin = "5px";

        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.value = user.userId;
        checkbox.checked = true;

        checkbox.addEventListener("change", () => updateChart(users));
        label.appendChild(checkbox);
        label.appendChild(document.createTextNode(user.displayName));
        container.appendChild(label);
      });

      document.getElementById("checkAll").onclick = () => {
        document
          .querySelectorAll("#userSelection input[type=checkbox]")
          .forEach((cb) => (cb.checked = true));
        updateChart(users);
      };

      document.getElementById("uncheckAll").onclick = () => {
        document
          .querySelectorAll("#userSelection input[type=checkbox]")
          .forEach((cb) => (cb.checked = false));
        updateChart(users);
      };
    }

    function getRandomColor() {
      return `hsl(${Math.random() * 360}, 100%, 50%)`;
    }

    function updateChart(users) {
      const selectedIds = Array.from(
        document.querySelectorAll("#userSelection input:checked")
      ).map((cb) => cb.value);
      const ctx = document.getElementById("logChart").getContext("2d");

      if (window.myChart) window.myChart.destroy();

      const labels = getDateRange();
      const datasets = users
        .filter((u) => selectedIds.includes(u.userId))
        .map((u) => ({
          label: u.displayName,
          data: labels.map((d) => u.dailyCounts[d] || 0),
          borderColor: getRandomColor(),
          fill: false,
          borderWidth: 2,
        }));

      window.myChart = new Chart(ctx, {
        type: "line",
        data: {
          labels,
          datasets
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              labels: {
                font: {
                  size: 14
                }
              }
            },
            title: {
              display: true,
              text: `期間: ${currentStartDate} 〜 ${currentEndDate}`,
            },
          },
          scales: {
            x: {
              title: {
                display: true,
                text: "日付"
              },
              ticks: {
                autoSkip: true,
                maxRotation: 45,
                minRotation: 45
              },
            },
            y: {
              title: {
                display: true,
                text: "ログ件数"
              },
              beginAtZero: true,
            },
          },
        },
      });
    }

    // ======== 追加: ローディング状態UI ========
    function setLoading(loading) {
      isLoading = loading;
      const blocker = document.getElementById("blocker");
      const rangePanel = document.getElementById("rangePanel");
      if (loading) {
        blocker.style.display = "block";
        rangePanel.classList.add("muted");
      } else {
        blocker.style.display = "none";
        rangePanel.classList.remove("muted");
      }
    }

    // ======== 追加: プリセット期間設定 ========
    function startOfThisWeek(date = new Date()) {
      // 月曜始まり
      const day = (date.getDay() + 6) % 7;
      const d = new Date(date);
      d.setDate(date.getDate() - day);
      d.setHours(0, 0, 0, 0);
      return d;
    }

    function setRangePreset(preset) {
      const today = new Date();
      let s, e;

      switch (preset) {
        case "thisWeek": {
          s = startOfThisWeek(today);
          e = new Date(s);
          e.setDate(s.getDate() + 6);
          if (e > today) e = today; // 未来を抑止
          break;
        }
        case "lastWeek": {
          const thisMon = startOfThisWeek(today);
          e = new Date(thisMon);
          e.setDate(e.getDate() - 1); // 先週日曜
          s = new Date(e);
          s.setDate(e.getDate() - 6); // 先週月曜
          break;
        }
        case "thisMonth": {
          s = new Date(today.getFullYear(), today.getMonth(), 1);
          e = today;
          break;
        }
        case "lastMonth": {
          s = new Date(today.getFullYear(), today.getMonth() - 1, 1);
          e = new Date(today.getFullYear(), today.getMonth(), 0); // 先月末
          break;
        }
        case "last7": {
          e = today;
          s = new Date(today);
          s.setDate(today.getDate() - 6);
          break;
        }
        case "last30": {
          e = today;
          s = new Date(today);
          s.setDate(today.getDate() - 29);
          break;
        }
        default:
          return;
      }

      // ステート反映
      currentStartDate = toYMD(s);
      currentEndDate = toYMD(e);

      // 日付入力にも反映
      document.getElementById("customStart").value = currentStartDate;
      document.getElementById("customEnd").value = currentEndDate;

      refresh();
    }

    // ======== 追加: カスタム期間の適用 ========
    function applyCustomRange() {
      const s = document.getElementById("customStart").value;
      const e = document.getElementById("customEnd").value;
      if (!s || !e) {
        alert("開始日と終了日を指定してください。");
        return;
      }
      if (new Date(s) > new Date(e)) {
        alert("開始日は終了日以前にしてください。");
        return;
      }
      currentStartDate = s;
      currentEndDate = e;
      refresh();
    }

    // ======== 追加: まとめて再取得→再描画 ========
    async function refresh() {
      try {
        setLoading(true);
        const results = await fetchLogs(
          cachedUserIds,
          currentStartDate,
          currentEndDate
        );
        renderTable(results);
        renderUserSelection(results);
        updateChart(results);
      } finally {
        setLoading(false);
      }
    }

    // ======== 初期化 ========
    (async () => {
      setLoading(true);
      try {
        cachedUserIds = await fetchAllUsers();
        // 初期日付を入力欄へ
        document.addEventListener("DOMContentLoaded", () => {
          document.getElementById("customStart").value = currentStartDate;
          document.getElementById("customEnd").value = currentEndDate;
        });
        await refresh();
      } finally {
        setLoading(false);
      }
    })();

    // ======== 追加: ボタンへのイベント割当（DOMContentLoaded後） ========
    document.addEventListener("DOMContentLoaded", () => {
      document
        .getElementById("btnThisWeek")
        .addEventListener("click", () => setRangePreset("thisWeek"));
      document
        .getElementById("btnLastWeek")
        .addEventListener("click", () => setRangePreset("lastWeek"));
      document
        .getElementById("btnThisMonth")
        .addEventListener("click", () => setRangePreset("thisMonth"));
      document
        .getElementById("btnLastMonth")
        .addEventListener("click", () => setRangePreset("lastMonth"));
      document
        .getElementById("btnLast7")
        .addEventListener("click", () => setRangePreset("last7"));
      document
        .getElementById("btnLast30")
        .addEventListener("click", () => setRangePreset("last30"));
      document
        .getElementById("btnApply")
        .addEventListener("click", applyCustomRange);
    });
  </script>
</head>

<body>
  <h1>ログ可視化 v2</h1>

  <!-- 追加: 期間選択UI -->
  <div id="rangePanel">
    <div class="range-controls">
      <button id="btnThisWeek">今週</button>
      <button id="btnLastWeek">先週</button>
      <button id="btnThisMonth">今月</button>
      <button id="btnLastMonth">先月</button>
      <button id="btnLast7">過去7日</button>
      <button id="btnLast30">過去30日</button>
    </div>
    <div class="range-controls">
      <input type="date" id="customStart" />
      <input type="date" id="customEnd" />
      <button id="btnApply">この期間で表示</button>
    </div>
  </div>

  <!-- ローディングブロッカー -->
  <div
    id="blocker"
    style="display:none; position:fixed; inset:0; background:rgba(255,255,255,.6); z-index:999; text-align:center; padding-top:20vh; font-size:18px;">
    取得中です…
  </div>

  <table id="logTable" border="1" style="margin-top:8px;">
    <tr>
      <th>読み込み中...</th>
    </tr>
  </table>

  <div
    id="userSelection"
    style="display: flex; flex-wrap: wrap; gap: 10px; margin: 15px 0"></div>

  <canvas id="logChart"></canvas>
</body>

</html>