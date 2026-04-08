<script>
  import { onMount } from 'svelte';
  import Nav from './components/Nav.svelte';
  import Hero from './components/Hero.svelte';
  import About from './components/About.svelte';
  import Projects from './components/Projects.svelte';
  import TechStack from './components/TechStack.svelte';
  import Achievements from './components/Achievements.svelte';
  import Footer from './components/Footer.svelte';

  let theme = 'light';

  function applyTheme(value) {
    theme = value;
    document.documentElement.dataset.theme = value;
    localStorage.setItem('altamis-theme', value);
  }

  function toggleTheme() {
    applyTheme(theme === 'light' ? 'dark' : 'light');
  }

  onMount(() => {
    const savedTheme = localStorage.getItem('altamis-theme');
    const preferredTheme = window.matchMedia('(prefers-color-scheme: dark)').matches
      ? 'dark'
      : 'light';

    applyTheme(savedTheme ?? preferredTheme);
  });
</script>

<div class="theme-shell font-sans antialiased">
  <Nav {theme} {toggleTheme} />
  <main id="content">
    <Hero />
    <About />
    <Projects />
    <TechStack />
    <Achievements />
  </main>
  <Footer />
</div>
