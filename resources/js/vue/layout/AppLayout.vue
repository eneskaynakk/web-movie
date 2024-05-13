<template>
    <section class="main-section">
      <app-header />

      <main class="flex-grow py-4 bg-black w-full h-full shadow-lg backdrop-blur-sm max-sm:px-8 border-t border-gray-100">
        <div class="container md:px-0 px-3 mx-auto">
          <slot />
        </div>
      </main>
      <app-footer />
    </section>
  </template>

  <script>
  import AppHeader from "@components/app/AppHeader.vue"
  import AppFooter from "@components/app/AppFooter.vue"

  export default {
    name: "AppLayout",
    components: { AppHeader, AppFooter }
  }
  </script>
