<template>
  <button type="button" class="btn icon-btn" v-on="$listeners">
    <base-icon
        v-if="!!text"
        :class="iconClass"
        aria-hidden="true"
    />

    {{ text }}
  </button>
</template>

<script>
import BaseIcon from "@components/base/BaseIcon.vue"

export default {
  name: "BaseIconAnimationButton",
  components: { BaseIcon },
  props: {
    text: {
      required: false,
      type: String
    },
    iconClass: {
      required: false,
      type: String,
      default: 'h-5 w-5 text-green-400'
    }
  }
}
</script>
