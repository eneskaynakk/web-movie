<template>
  <button type="button" class="btn" v-on="$listeners">
    <span class="flex items-center gap-x-2 justify-center">
      <base-icon
          v-if="!!iconClass"
          :class="iconClass"
          aria-hidden="true"
      />

      <template v-if="text">{{ text }}</template>
    </span>
  </button>
</template>

<script>
import BaseIcon from "@components/base/BaseIcon.vue"

export default {
  name: "BaseIconButton",
  components: { BaseIcon },
  props: {
    text: {
      required: false,
      type: String
    },
    iconClass: {
      required: false,
      type: String,
      default: 'text-lg text-green-400'
    }
  }
}
</script>
