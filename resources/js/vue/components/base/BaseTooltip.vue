<template>

  <base-icon class="icofont-warning-alt text-red-700" v-title="text" />
</template>

<script>
import BaseIcon from "@components/base/BaseIcon.vue"

export default {
  name: "BaseTooltip",
  components: { BaseIcon },
  props: {
    text: {
      required: true,
      type: String
    }
  }
}
</script>
