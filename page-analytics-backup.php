<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログ可視化</title>
    <script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/11.4.0/firebase-app.js";
    import { getFirestore, collectionGroup, collection, doc, getDocs, getDoc } from "https://www.gstatic.com/firebasejs/11.4.0/firebase-firestore.js";

    const firebaseConfig = {
        apiKey: "AIzaSyDmGw3gLvcfv_LWLSnAd-Ds-p60BY1zCFw",
        authDomain: "pichipichipet.firebaseapp.com",
        projectId: "pichipichipet"
    };

    const app = initializeApp(firebaseConfig);
    const db = getFirestore(app);

    async function fetchLogs() {
        try {
            const logsSnapshot = await getDocs(collectionGroup(db, "logs"));
            const users = {};

            // 一時的に userId を記録して、後でまとめて displayName を取得する
            const userIdsSet = new Set();

            logsSnapshot.forEach(doc => {
                const pathParts = doc.ref.path.split('/');
                const userId = pathParts[1];
                const data = doc.data();
                const rawTimestamp = data.timestamp;

                let timestamp = null;
                if (rawTimestamp && typeof rawTimestamp.toDate === "function") {
                    timestamp = rawTimestamp.toDate();
                } else if (typeof rawTimestamp === "number") {
                    timestamp = new Date(rawTimestamp);
                } else {
                    console.warn(`⚠️ 無効な timestamp:`, rawTimestamp);
                    return;
                }

                if (isNaN(timestamp.getTime())) {
                    console.warn(`⚠️ timestamp が無効な日付:`, rawTimestamp);
                    return;
                }

                const dateStr = timestamp.toISOString().split("T")[0];
                userIdsSet.add(userId);

                if (!users[userId]) {
                    users[userId] = {
                        userId,
                        displayName: userId, // 仮
                        dailyCounts: {}
                    };
                }

                users[userId].dailyCounts[dateStr] = (users[userId].dailyCounts[dateStr] || 0) + 1;
            });

            // displayName を全ユーザー分まとめて取得
            await Promise.all([...userIdsSet].map(async userId => {
                const userDocRef = doc(db, "users", userId);
                const userDocSnap = await getDoc(userDocRef);
                if (userDocSnap.exists()) {
                    const userData = userDocSnap.data();
                    users[userId].displayName = userData.displayName || userId;
                }
            }));

            const userList = Object.values(users);
            renderTable(userList);
            renderUserSelection(userList);
            updateChart(userList);
            return userList;
        } catch (error) {
            console.error("❌ データ取得失敗:", error);
            alert("データ取得時にエラーが発生しました。");
            return [];
        }
    }

    function getDateRange() {
        const start = new Date("2025-03-01");
        const end = new Date();
        const dates = [];

        for (let d = new Date(start); d <= end; d.setDate(d.getDate() + 1)) {
            dates.push(d.toISOString().split("T")[0]);
        }
        return dates;
    }

    function renderTable(users) {
        const table = document.getElementById("logTable");
        const dateRange = getDateRange();

        let header = "<tr><th>ユーザー</th>";
        dateRange.forEach(date => header += `<th>${date}</th>`);
        header += "</tr>";

        let body = "";
        users.forEach(user => {
            let row = `<tr><td>${user.displayName}</td>`;
            dateRange.forEach(date => {
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

        users.forEach(user => {
            const label = document.createElement("label");
            label.style.margin = "5px";

            const checkbox = document.createElement("input");
            checkbox.type = "checkbox";
            checkbox.value = user.userId; // displayNameではなく内部処理用にuserId
            checkbox.checked = true;

            checkbox.addEventListener("change", () => updateChart(users));
            label.appendChild(checkbox);
            label.appendChild(document.createTextNode(user.displayName));
            container.appendChild(label);
        });

        document.getElementById("checkAll").onclick = () => {
            document.querySelectorAll("#userSelection input[type=checkbox]").forEach(cb => cb.checked = true);
            updateChart(users);
        };

        document.getElementById("uncheckAll").onclick = () => {
            document.querySelectorAll("#userSelection input[type=checkbox]").forEach(cb => cb.checked = false);
            updateChart(users);
        };
    }

    function getRandomColor() {
        return `hsl(${Math.random() * 360}, 100%, 50%)`;
    }

    function updateChart(users) {
        const selectedIds = Array.from(document.querySelectorAll("#userSelection input:checked"))
            .map(cb => cb.value);
        const ctx = document.getElementById("logChart").getContext("2d");

        if (window.myChart) window.myChart.destroy();

        const labels = getDateRange();
        const datasets = users
            .filter(u => selectedIds.includes(u.userId))
            .map(u => ({
                label: u.displayName,
                data: labels.map(d => u.dailyCounts[d] || 0),
                borderColor: getRandomColor(),
                fill: false,
                borderWidth: 2
            }));

        window.myChart = new Chart(ctx, {
            type: "line",
            data: { labels, datasets },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: { font: { size: 14 } }
                    }
                },
                scales: {
                    x: {
                        title: { display: true, text: "日付" },
                        ticks: { autoSkip: true, maxRotation: 45, minRotation: 45 }
                    },
                    y: {
                        title: { display: true, text: "ログ件数" },
                        beginAtZero: true
                    }
                }
            }
        });
    }

    fetchLogs();
</script>



    <script src="https://cdn.jsdelivr.net/npm/dayjs@1.11.7/dayjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <h1>ログ可視化</h1>
    <table id="logTable" border="1">
        <tr>
            <th>読み込み中...</th>
        </tr>
    </table>
    <div id="userSelection" style="display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 15px;"></div>

    <canvas id="logChart"></canvas>
</body>

</html>