# RESPONSIVE.md — Jugogradnja

Desktop frames are the complete source of truth and hold every element. Mobile frames at 393px (root node `4575:2`; per-page IDs in BUILD-PLAN.md) are a reference for how the desktop breaks down to small screens, not a separate or reduced content set. Reproduce 100% of the desktop elements on mobile, using the mobile frames as the guide for the reflow. This document defines the breakpoint system and the collapse rules, both for sections that have a mobile frame and for any element or screen that does not.

Mobile is where load-speed performance is judged. The Core Web Vitals targets in CLAUDE.md apply to a mid-tier mobile device.

## Breakpoints (Tailwind defaults, per the design system)

Mobile-first. Base styles target the smallest screen; add `min-width` queries upward.

| Name | Min width | Device |
|------|-----------|--------|
| base | 0px | phones (design reference 393px) |
| sm | 640px | large phones |
| md | 768px | tablets |
| lg | 1024px | laptops |
| xl | 1280px | desktops |
| 2xl | 1536px | large screens |

Container max width 1916px, centered. Horizontal padding 16px mobile, 32px desktop (set in theme.json). Constrain text columns to roughly 1280px; full-bleed sections may span to 1916px.

## Global rules

- Mobile-first CSS, min-width queries only.
- Typography is fluid via theme.json. The design system per-style sizes (DESIGN-SYSTEM.md) are the target at each breakpoint.
- Section vertical padding scales 96px desktop to 48px mobile via the spacing scale.
- Minimum tap target 44x44px for links, buttons, nav items, form controls.
- Form inputs at least 16px font to prevent iOS auto-zoom.
- Visible focus states (gold focus ring, `#C5A059`).

## Per-section collapse rules

Match the mobile Figma frames first; these rules cover behavior between the designed breakpoints and any undesigned section.

- Header / nav: the single global header (desktop node `683:1903`) shows the logo, the primary nav with dropdowns (Usluge, Sofeija, VELUX), and the language/script control. Full horizontal nav at lg and up. Below lg, a hamburger opens the designed full-screen drawer (mobile node `4577:10283`) holding the white logo, the "Navigacija" list, and the control. The control is the Cyrillic/Latin toggle labelled in the target script: "Sr | En" in Cyrillic (Sr switches to Latin), "ср | En" in Latin (ср switches to Cyrillic), En switches to English. Proper aria and focus trapping.
- Hero: fixed desktop height becomes min-height with auto growth on mobile. H1 scales toward 40px on small screens. Art-direct the background with `<picture>` (wider crop desktop, tighter crop mobile). This is the LCP element: preload it, never lazy-load it.
- Stat counters: 3 across at md and up; stacked or reduced on mobile per the mobile frame.
- Service cards (four pillars): 2-column grid on BOTH desktop and mobile (this is intentional, not a collapse). Desktop height 500px, gap 8px, radius 24px; mobile height 250px, gap 3px, radius 16px.
- Certifications strip: 3 columns at md and up, stacked below.
- CTA banner: text centers, button full width below md, padding scales.
- Content + image split: side by side at lg and up, stacked below; keep a consistent stack order across pages.
- CPT archive grids (Projekti, Nekretnine, Pozicije): 3 columns at xl, 2 at md, 1 below md. Filters collapse into a dropdown or expandable panel on mobile.
- Real estate single spec table: stacked label/value rows on mobile, or horizontally scrollable; never overflow the viewport.
- Accordion / steps (VELUX guide, FAQ): vertical already; large tap targets, clear open/close state.
- Forms: single column on mobile, full-width inputs.
- Footer: multi-column at lg and up; stacked or collapsible groups below md.

## Images

- Responsive `srcset` with a `sizes` attribute matched to the layout at each breakpoint.
- Explicit width and height (or aspect-ratio) to prevent layout shift.
- AVIF or WebP with a fallback.
- Hero and art-directed images via `<picture>` with breakpoint-specific sources.
- Lazy-load everything below the fold; never the LCP hero.

## Testing widths

QA at 393, 640, 768, 1024, 1280, 1536, and 1920px. Verify fidelity against the desktop frames at 1920 and the mobile frames at 393, and confirm clean behavior at the widths in between.
