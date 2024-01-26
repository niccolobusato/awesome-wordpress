# Easily Reverse WPBakery Columns On Mobile
Unfortunately, WPBakery doesn’t come with the option to reverse columns on mobile to make better responsive orders of content. However, by adding some simple CSS you can achieve this effect using CSS’s flexbox.

To get the reverse columns working:
- Add the swap-on-mobile CSS class to the row you want to have columns swapped.
- Add the CSS below into your themes CSS (Appearance > Customize > Additional CSS) depending on what kind of WPBakery you are using


# Standard version of WPBakery
```css
@media only screen and (max-width: 769px) {
	.swap-on-mobile {
		display: flex !important;
		flex-direction: column-reverse;
	}
}
```
# Sailent version of WPBakery
```css
@media only screen and (max-width: 769px) {
	.swap-on-mobile .row_col_wrap_12 {
		display: flex !important;
		flex-direction: column-reverse;
	}
}
```
