<template>
  <div class="relative mb-3">
    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ label }}</label>
    <textarea v-bind="$attrs" v-model="input" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
  </div>
</template>
<script>
export default {
  name: "BaseLabelTextarea",
  props: {
    value: {
      required: true
    },
    label: {
      required: true,
      type: String
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