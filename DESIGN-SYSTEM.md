# DESIGN-SYSTEM.md — Jugogradnja

Canonical design reference, distilled from the client design system handoff (Google Drive: "Jugogradnja Website - Design System Handoff.rtf", dated June 3, 2026) and verified against the Figma file.

IMPORTANT: the source handoff was written for a React + TypeScript + Tailwind CSS v4 build. We are building a WordPress block theme. The tokens and rules below are authoritative; the original's implementation details (Tailwind classes, `figma:asset` imports, `/src/styles/*`) are reference-only and are translated into `theme.json` and theme CSS here. Do not introduce Tailwind or React.

## Colors

| Token | Value | Use |
|-------|-------|-----|
| primary | `#212950` | Brand, all headings, body text, hero and card gradient overlays |
| footer-blue | `#253D86` | Footer background only |
| accent | `#C5A059` | Gold: stat numbers, uppercase labels, hover underlines, focus ring |
| surface | `#F9F9F9` | Page background |
| base | `#FFFFFF` | Card background |
| muted | `#E5E5E5` | Muted backgrounds |
| muted-foreground | `#5A5A6F` | Muted text |
| error | `#D4183D` | Error and warning states |
| border | `rgba(33,41,80,0.1)` | Hairline borders |

Text uses primary at reduced opacity in places: body `rgba(33,41,80,0.8)`, small text `0.7`, nav links `0.9`. White text on dark: `#FFFFFF`, `rgba(255,255,255,0.9)`, `rgba(255,255,255,0.7)`.

Note: there are two blues. Primary `#212950` is darker; footer `#253D86` is brighter. The earlier single-blue assumption was wrong. Verify per section against Figma if a blue looks ambiguous.

## Typography

Headings: Montserrat. Body: Roboto. Both currently imported from Google Fonts in the source; we self-host (see CLAUDE.md performance rules).

| Style | Family / weight | Desktop size | Mobile size | Line height | Color |
|-------|------------------|--------------|-------------|-------------|-------|
| Hero H1 | Montserrat 700 | 72px, letter-spacing 1.8px | scales down | 72px | primary / white |
| H1 (page title) | Montserrat 700 | 48px | 36px | 48px | primary |
| H2 (section) | Montserrat 700 | 36px | 24px (tablet 32px) | 1.5 | primary |
| H3 (card/component) | Montserrat 700 | 24px | 18px | 32px / tight | white or primary |
| H4 (subsection) | Montserrat 500 | 16px | 16px | 24px | primary or white |
| Body paragraph | Roboto 300 | 18px | 18px | 1.8 | primary 80% |
| Small paragraph | Roboto 300 | 14px | 14px | 20px | primary 70% |
| Medium emphasis | Roboto 400 | 16px | 16px | 1.5 | primary |
| Strong inline | Roboto 600 | inherit | inherit | inherit | primary |
| Nav link | Roboto 300 | 16px | 16px | n/a | primary 90%, hover primary + gold underline |
| Footer link | Roboto 300 | 14px | 14px | 20px | white 70%, hover gold |
| CTA / uppercase label | Roboto 300, uppercase, letter-spacing 0.05em | 14px | 10px | 20px | gold |

## Spacing

- Section vertical padding: 96px desktop, 48px mobile.
- Container horizontal padding: 32px desktop, 16px mobile.
- Element rhythm: 16, 24, 32, 48, 64px.
- Container max width: 1916px, centered. Constrain text columns narrower (theme.json contentSize is 1280px); full-bleed sections use wide/full alignment up to 1916px. Verify per section.

## Corners and borders

- Default radius: 0 (sharp corners) for buttons, inputs, sections.
- Cards: 24px desktop, 16px mobile.

## Components

Header: white background, 80px tall, logo 320px wide (desktop, scales on mobile), sticky `fixed` at top with `z-index` above content, gains a shadow on scroll. Nav links animate a 2px gold underline from 0 to 100% width over 300ms on hover.

Footer: background `#253D86`, text white 70%, white logo 314px wide, section titles Montserrat 500 16px white, links hover to gold.

Service cards (the four pillars): 2-column grid on BOTH desktop and mobile. Desktop card height 500px, gap 8px, radius 24px; mobile height 250px, gap 3px, radius 16px. Each card has a bottom-to-top gradient overlay (`#212950` 95% to 50% to transparent) and a `scale(1.1)` image zoom on hover over 700ms.

Hero: large background image with a flat `rgba(33,41,80,0.7)` overlay, centered text, H1 at 72px. Outlined CTA button below.

Primary button: transparent background, 2px solid white border, white text, padding roughly 16px 48px, all-300ms transition, background and color shift on hover.

Dropdown menu (for nav, for example Usluge): white background, border gold at 20% opacity, extra-large shadow, hover item background gold at 10%.

## Interaction and motion

- Standard transition: all 300ms ease. Color transitions 300ms. Transform/image transitions 700ms.
- Image hover: `scale(1.1)`.
- Nav underline: animate width 0 to 100%, 2px gold.
- Header: sticky, shadow appears on scroll.
- Smooth scroll for anchor links; scroll to top on navigation.
- Stat numbers (34+, 500+, 100+): gold, large. Count-up animation is reasonable on scroll into view but is not mandated by the doc, so treat as optional polish.

## Assets referenced in the handoff

The handoff lists images by internal React export hashes (not directly downloadable). Export the real equivalents from Figma during Phase 0:
- Header logo (color), about 320x50px.
- Footer logo (white), about 314x49px.
- Four service images: Visokogradnja, Rekonstrukcija, Investicije i razvoj projekata, Enterijer.
Prefer SVG for the logo if available; otherwise export high-resolution PNG and convert raster photography to WebP/AVIF.
