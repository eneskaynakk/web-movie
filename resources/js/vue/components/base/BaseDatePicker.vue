<template>
  <div class="w-full">
    <div class="text-sm text-stone-900 font-medium" v-show="!!label">{{ label }}</div>
    <date-picker
        v-model="date"
        format="DD/MM/YYYY"
        value-type="DD/MM/YYYY"
        placeholder="Tarih Seçiniz"
    />
  </div>
</template>

<script>
import DatePicker from 'vue2-datepicker'
import 'vue2-datepicker/locale/tr'
import dayjs from "dayjs"

export default {
  name: "BaseDatePicker",
  components: { DatePicker },
  props: {
    value: {
      required: true
    },
    label: {
      required: false,
      type: String
    }
  },
  computed: {
    date: {
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