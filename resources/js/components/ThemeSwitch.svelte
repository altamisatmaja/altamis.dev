<script>
  export let theme = 'light';
  export let toggleTheme = () => {};

  $: isDark = theme === 'dark';
</script>

<button
  type="button"
  class:theme-switch--dark={isDark}
  class="theme-switch"
  aria-label={`Switch to ${isDark ? 'light' : 'dark'} mode`}
  aria-pressed={isDark}
  on:click={toggleTheme}
>
  <span class="theme-switch__track">
    <span class="theme-switch__thumb">
      <span class="theme-switch__glyph theme-switch__glyph--line"></span>
      <span class="theme-switch__glyph theme-switch__glyph--ring"></span>
    </span>
  </span>
</button>
