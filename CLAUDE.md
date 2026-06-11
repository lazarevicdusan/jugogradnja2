# CLAUDE.md — Jugogradnja WordPress Rebuild

Operating guide for Claude Code on this project. Read it fully before starting any phase. Read DESIGN-SYSTEM.md, BUILD-PLAN.md, and RESPONSIVE.md alongside it.

## Project summary

Rebuild the Jugogradnja corporate website from scratch on WordPress, matching the Figma design exactly in layout, color, and typography. Jugogradnja is a construction and engineering company. Content is in Serbian (Cyrillic primary), with a Latin script toggle and an English translation.

Figma file key: `9a9EbaNY2O1GKylr22Uq8N`
Desktop frames root node: `4219:2`. Mobile frames root node: `4575:2`.
Per-page desktop and mobile node IDs are in BUILD-PLAN.md.

## Source files and authority

- Figma is the visual source of truth. Desktop frames are the approved final copy; mobile frames use the exact same copy as desktop (source copy from the desktop frames even if a mobile frame shows different text).
- DESIGN-SYSTEM.md is the canonical token and component reference, distilled from the client handoff. The original handoff was written for a React + TypeScript + Tailwind v4 build; we are building a WordPress block theme, so its tokens and rules apply but its implementation specifics (Tailwind, React, figma:asset imports) do not. Do not introduce Tailwind or React.

## Confirmed decisions

1. Editing model: native Gutenberg. Custom block theme (Full Site Editing). No page builder, no Tailwind, no React.
2. Languages: Serbian Cyrillic (primary), Serbian Latin (auto-transliterated from Cyrillic), English (true translation via WPML, paid license).
3. Dynamic content via custom post types: Projekti/Reference, Nekretnine, Karijera pozicije.
4. Top priority is page load speed. Every build decision defers to performance.

## Tech stack

- WordPress (latest stable), custom block theme using `theme.json` for all design tokens.
- Native block patterns for static sections; a small number of custom dynamic blocks (`block.json` + `render.php`) only where native blocks cannot hit the design or need a query (stat counters, CPT card grids, accordions, forms).
- WPML (paid license) for the English translation, including String Translation for theme strings and translation of CPTs, taxonomies, and menus. Latin is generated from Cyrillic via a transliteration filter plus a script switcher (WPML has no native Cyrillic-to-Latin transliteration). Given the speed priority, keep WPML lean: enable object caching, load only the WPML components in use, and disable the rest.
- Minimal vanilla JavaScript only (mobile nav drawer, sticky-header shadow, nav underline, accordions, optional count-up, script toggle, smooth scroll). No jQuery.
- Forms: lightweight solution (see BUILD-PLAN open items).

## Design tokens (corrected, see DESIGN-SYSTEM.md for full detail)

- Primary brand and text and gradients: `#212950`. Footer background only: `#253D86`. Accent gold: `#C5A059`.
- Page background `#F9F9F9`, cards `#FFFFFF`.
- Headings Montserrat (700, and 500 for H4). Body Roboto (300 body, 400 emphasis, 500 buttons, 600 strong).
- Sharp corners by default; cards 24px desktop / 16px mobile.
- Standard motion 300ms; image/transform 700ms.

## Local environment

- Use `wp-env` (default) or DDEV. Theme in git, commit per section.
- Export Figma assets and commit them before referencing. Figma asset URLs expire after 7 days; never reference them live.

## Performance rules (top priority, non-negotiable)

- Drive all colors, fonts, spacing from `theme.json`. No ad hoc inline styles.
- Self-host fonts (Montserrat 500/700, Roboto 300/400/500/600) as woff2, subset to Latin, Latin Extended, and Cyrillic. `font-display: swap`, preload only the weights used above the fold. (The handoff imports these from Google Fonts; we self-host instead for speed and to serve Cyrillic.)
- Per-block style loading so block CSS loads only where used (`should_load_separate_core_block_assets`).
- Images: WebP/AVIF, responsive `srcset`, explicit width/height to avoid CLS, lazy-load below the fold, never lazy-load the LCP hero.
- Remove default bloat (emoji script, unused oEmbed, unused CSS/JS). Defer non-critical JS.
- Core Web Vitals targets on mid-tier mobile: LCP under 2.5s, CLS under 0.1, INP under 200ms.
- Keep plugin count minimal; every plugin must justify its weight.

## Design fidelity rules

- Pull each section from its Figma node (desktop and mobile node IDs per page in BUILD-PLAN.md). Rebuild with semantic HTML and responsive flex/grid; do not copy Figma absolute positioning.
- Desktop frames are the complete source of truth and hold every element. Mobile frames at 393px are a reference for how the desktop breaks down to small screens, not a separate or reduced content set. Reproduce 100% of the desktop elements on mobile, using the mobile frames to guide the reflow. Where a desktop page has no exact mobile frame, apply the same breakdown logic shown in the mobile frames that do exist. Build mobile-first per RESPONSIVE.md. Only utility screens (404, search, cookie, etc.) lack designs.
- Match colors and fonts exactly to DESIGN-SYSTEM.md and `theme.json`. Verify each section against both the desktop and mobile Figma screenshots before moving on.

## Working conventions

- Build in the phase order in BUILD-PLAN.md. Verify each phase before the next.
- After each section, screenshot the matching Figma node (desktop and mobile) and compare.
- Default content strings in Serbian Cyrillic; CPT, taxonomy, and field slugs in clear Latin.
- Ask before adding any new plugin or external dependency.

## Out of scope unless requested

- E-commerce / payments.
- VELUX as a CPT (VELUX pages are fixed marketing pages built as regular pages with patterns).
