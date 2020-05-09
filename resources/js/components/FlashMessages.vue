<template>
  <div>
    <transition enter-active-class="animated bounceInRight"
                leave-active-class="animated bounceOutRight"
                class="fixed inset-0 transition-opacity">
      <div :class="{'bg-green-100': hasSuccess, 'bg-red-600': hasErrors}"
           class="fixed top-0 mt-20 right-0 mr-2 max-w-md shadow-lg mb-6 w-full rounded-lg pointer-events-auto"
           v-if="(hasSuccess || hasErrors) && show">
        <div class="rounded-lg shadow-xs overflow-hidden">
          <div class="p-4">
            <div class="flex items-start">
              <div class="flex-shrink-0">
                <svg v-if="hasSuccess" class="h-4 w-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <svg v-if="hasErrors" class="ml-4 mr-2 flex-shrink-0 w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm1.41-1.41A8 8 0 1 0 15.66 4.34 8 8 0 0 0 4.34 15.66zm9.9-8.49L11.41 10l2.83 2.83-1.41 1.41L10 11.41l-2.83 2.83-1.41-1.41L8.59 10 5.76 7.17l1.41-1.41L10 8.59l2.83-2.83 1.41 1.41z" />
                </svg>
              </div>
              <div class="ml-3 w-0 flex-1 pt-0.5">
                <p class="text-sm leading-5 font-bold text-gray-900" v-if="hasSuccess">
                  <span>{{ $page.flash.success }}</span>
                </p>
                <p class="text-sm leading-5 font-bold text-white" v-else>
                  <span v-if="Object.keys($page.errors).length === 1">Verifique o campo com erro.</span>
                  <span v-else>Verifique os {{ Object.keys($page.errors).length }} campos com erro.</span>
                </p>
              </div>
              <div class="ml-4 flex-shrink-0 flex">
                <button @click="show = false" type="button"
                        :class="{'text-green-600': hasSuccess, 'text-red-100': hasErrors}"
                        class="inline-flex focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                  <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  data() {
    return {
      show: true,
    }
  },
  computed: {
    hasErrors() {
      return this.$page.flash.error || Object.keys(this.$page.errors).length > 0
    },
    hasSuccess() {
      return this.$page.flash.success
    }
  },
  watch: {
    '$page.flash': {
      handler() {
        this.show = true
        setTimeout(() => this.show = false, 3500)
      },
      deep: true,
    },
  },
}
</script>
