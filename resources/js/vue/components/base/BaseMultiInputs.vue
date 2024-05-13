<template>
  <div>
    <div class="rounded-md px-3 pb-1.5 pt-2.5 shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-primary">
      <base-input
          v-model="firstVal"
          :name="$attrs.firstId"
          :id="$attrs.firstId"
          :placeholder="$attrs.firstPlaceholder"
      />
      <base-input
          v-model="lastVal"
          :name="$attrs.lastId"
          :id="$attrs.lastId"
          :placeholder="$attrs.lastPlaceholder"
      />
    </div>

    <slot />
  </div>
</template>

<script>
import BaseInput from "@components/base/BaseInput.vue"

export default {
  name: "BaseMultiInputs",
  components: { BaseInput },
  inheritAttrs: false,
  props: {
    firstInput: {
      required: true
    },
    lastInput: {
      required: true
    }
  },
  computed: {
    firstVal: {
      get() {
        return this.firstInput
      },
      set(nV) {
        this.$emit('update:firstInput', nV)
      }
    },
    lastVal: {
      get() {
        return this.lastInput
      },
      set(nV) {
        this.$emit('update:lastInput', nV)
      }
    }
  }
}
</script>