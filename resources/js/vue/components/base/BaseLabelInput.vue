<template>
  <div class="rounded-md px-3 pb-1.5 pt-2.5 shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-primary">
    <label :for="$attrs.id" class="block text-xs font-medium text-gray-900">{{ label }}</label>
    <base-input type="text" v-model="input" :name="$attrs.id" :id="$attrs.id" :placeholder="label" />
  </div>
</template>
<script>
import BaseInput from "@components/base/BaseInput.vue"

export default {
  name: "BaseLabelInput",
  components: {BaseInput},
  inheritAttrs: false,
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