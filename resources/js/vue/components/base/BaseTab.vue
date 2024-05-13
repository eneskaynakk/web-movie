<template>
  <div v-show="isActive" :class="contentClass" :id="identity">
    <slot />
  </div>
</template>

<script>
export default {
  components: {},
  name: "Tab",
  props: {
    name: { required:true },
    count: { required:false },
    selected: { default:false },
    identity: { required:false },
    contentClass: {
      required: false,
      default: "px-4 py-2"
    }
  },
  data() {
    return {
      isActive: false
    }
  },
  mounted() {
    this.isActive = this.selected;
  }
}
</script>
