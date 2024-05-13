<template>
  <div>
    <div v-if="showModal" :class="modalClass" class="overflow-x-hidden overflow-y-auto fixed inset-0 outline-none focus:outline-none justify-center items-center flex">
      <div class="relative w-1/2 my-6 mx-auto max-w-6xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
          <!--header-->
          <div class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
            <h3 class="text-3xl font-semibold">
              {{ title }}
            </h3>
            <slot name="header" />
            <button class="p-1 ml-auto bg-transparent border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none" @click="toggleModal()">
              <span class="bg-transparent text-stone-500 h-6 w-6 text-2xl block outline-none focus:outline-none">
                ×
              </span>
            </button>
          </div>
          <!--body-->
          <div :class="bodyClass" class="relative px-6 py-3 flex-auto max-h-[35rem] overflow-y-scroll">
            <p class="my-4 text-slate-500 text-lg leading-relaxed">
              <slot name="body" />
            </p>
          </div>
          <!--footer-->
          <div v-show="hasFooter" class="flex gap-2 items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
            <base-button v-show="isCloseButton" class="btn-dark" :text="closeButton" @click="toggleModal()" />
            <slot name="footer" />
          </div>
        </div>
      </div>
    </div>
    <div v-if="showModal" class="opacity-25 fixed inset-0 z-30 bg-black"></div>
  </div>
</template>

<script>
export default {
  name: "BaseModal",
  props: {
    value: {
      required: true,
      type: Boolean
    },
    title: {
      required: true,
      type: String
    },
    modalClass: {
      required: false,
      type: String,
      default: 'z-40'
    },
    closeButton: {
      required: false,
      type: String,
      default: 'Kapat'
    },
    confirmButton: {
      required: false,
      type: String,
      default: 'Kaydet'
    },
    isCloseButton: {
      required: false,
      type: Boolean,
      default: true
    },
    hasFooter: {
      required: false,
      type: Boolean,
      default: true
    },
    bodyClass: {
      required: false,
      type: String
    }
  },
  computed: {
    showModal: {
      get() {
        return this.value
      },
      set(nV) {
        this.$emit('input', nV)
      }
    }
  },
  methods: {
    toggleModal() {
      this.showModal = !this.showModal
    }
  }
}
</script>