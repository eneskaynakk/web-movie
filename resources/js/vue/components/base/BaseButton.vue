<template>
  <button type="button" class="btn" v-on="$listeners">
    {{ text }}
    <slot/>
  </button>
</template>

<script>
export default {
  props: {
    text: {
      required: false,
      type: String
    },
    iconClass: {
      required: false,
      type: String
    }
  }
}
</script>
