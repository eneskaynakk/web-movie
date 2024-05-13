<template>
  <input
      type="text"
      v-model="input"
      class="block w-full border-0 p-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
  />
</template>
<script>
export default {
  name: "BaseInput",
  props: {
    value: {
      required: true
    }
  },
  computed: {
    input: {
      get() {
        return this.value
      },
      set(nV) {
        this.$emit('input', nV)
      }
    }
  }
}
</script>