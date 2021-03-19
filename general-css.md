# hide google captcha badgee
```css
.grecaptcha-badge { opacity:0;}
```
# "replace" logo in a specific page via page id
#### does not replace but in reality it puts another logo on thop of the first so the two logos should be exactly the same
```css
.page-id-7 img.logo-main.scale-with-grid {
   content: url(path-to-url);
}
```

# equidistant objects with css

```css
.container {
  display: flex;
  justify-content: space-between;
}
```
# link to button
```html
<a href="https://google.com" class="button">Go to Google</a>
```
```css
a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;
    text-decoration: none;
    color: initial;
}
```
