<template>
  <div :class="themeConfig[theme]" class="inline-flex items-center px-3 py-1 rounded-full gap-x-2">
    <slot />

    <h2 class="flex items-center gap-2 text-sm font-normal">
      <base-icon :class="icon" v-show="!!icon" />
      {{ text }}
    </h2>
  </div>
</template>

<script>
import BaseIcon from "@components/base/BaseIcon.vue"

export default {
  name: "BaseBadge",
  components: {BaseIcon},
  props: {
    text: {
      required: true,
      type: String
    },
    icon: {
      required: true,
      type: String
    },
    theme: {
      required: false,
      type: String,
      default: 'success'
    }
  },
  data() {
    return {
      themeConfig: {
        success: 'text-green-500 bg-green-100/60',
        warning: 'text-yellow-500 bg-yellow-100/60',
        danger: 'text-red-500 bg-red-100/60'
      }
    }
  }
}
</script>
