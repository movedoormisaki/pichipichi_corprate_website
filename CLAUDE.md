# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is the **swell_child** theme for the Pichi-Pichi Co., Ltd. (ぴちぴち株式会社) corporate website. It's a WordPress child theme extending the SWELL parent theme, running on Local by Flywheel for development.

- **Live site**: pichipichi.co.jp
- **Parent theme**: SWELL (Japanese WordPress theme)
- **Development environment**: Local by Flywheel on Windows

## Build & Development

### SCSS Compilation

The theme uses SCSS with two separate build targets:

1. **Main theme styles** (`scss/theme.scss` → `theme.min.css`)
2. **Landing page styles** (`lp-scss/lp.scss` → `lp.min.css`)

Both entry points use the same structure:

```scss
@use "foundation";
@use "layout";
@use "object/project";
@use "object/component";
```

SCSS must be compiled externally (no npm/build scripts included). Use any SCSS compiler that outputs minified CSS with sourcemaps.

### Deployment

Files are deployed via SFTP (upload-on-save configured in VS Code). The `.vscode/sftp.json` contains deployment settings to the xserver.jp production server.

**Important**: The sftp.json file contains credentials. Do not commit changes to this file.

## Architecture

### SCSS Structure (FLOCSS-based)

```
scss/ (or lp-scss/)
├── foundation/     # Reset, base styles
├── global/         # Variables, mixins, functions (shared via @use)
│   ├── _color.scss      # CSS custom properties for colors
│   ├── _function.scss   # fz(), fluidSize() utility functions
│   ├── _mixin.scss      # mq() breakpoint mixin
│   └── _variable.scss   # (imports function)
├── layout/         # Header, footer (l-header, l-footer)
└── object/
    ├── component/  # Reusable UI (c-btn, c-headline)
    └── project/    # Page-specific styles (top, about, single, news)
```

### Breakpoints (defined in `_mixin.scss`)

```scss
"xs": 390px, "sm": 576px, "md": 768px, "lg": 1024px,
"xl": 1284px, "xl-l": 1420px, "xxl": 1600px, "xxxl": 1920px
```

Usage: `@include mq(md)` for min-width, `@include mq(md, max)` for max-width

### Utility Functions

- `fz($px)` - Convert px to rem (base 16px)
- `fluidSize($max, $min, $maxBp, $minBp)` - Fluid typography/spacing using clamp()

### Page Templates

Custom page templates in root directory:

- `front-page.php` - トップページ (home)
- `page-about-us.php` - 私たちについて (company info)
- `page-news.php` - お知らせ一覧
- `page-analytics.php` - Analytics dashboard
- `page-lp-tap.php` - たっぷ landing page
- `single.php` - News article (extends SWELL_Theme)

### Key PHP Patterns

1. **Custom navigation**: `get_custom_menu_items()` returns array of menu items used in header/footer
2. **Template structure**: Each page uses `get_header()` + `include 'nav.php'` + content + `get_footer()`
3. **Asset versioning**: CSS files use filemtime() for cache busting
4. **Conditional loading**: `lp.min.css` loads only on LP pages, `theme.min.css` elsewhere

### External Dependencies

Loaded via CDN on specific pages:

- **Swiper** (front-page, LP) - Carousel functionality
- **Rellax.js** - Parallax scrolling for `.circle` elements
- **Google Fonts** - Lilita One, M PLUS Rounded 1c

### Contact Form

Uses Contact Form 7 plugin with auto-paragraph disabled (`wpcf7_autop_or_not` filter).

## File Conventions

- PHP templates use Japanese template names in header comments
- BEM-style CSS class naming (block\_\_element, c-component, l-layout)
- Decorative circle elements use `.circle` class with `.circle__puru` for animation
- SVG wave separators between sections (`section_wave`, `wave_top`, `wave_bottom`)
