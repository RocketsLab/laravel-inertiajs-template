<template>

</template>

<script>
  export default {
    name: "Notify",
    watch: {
      '$page.flash': {
        handler() {

          let type = null
          let message = null

          if (this.$page.flash.success) {
            type = 'success'
            message = this.$page.flash.success
            return this.notify(type, message)
          }

          if(this.$page.flash.errors && Object.keys(this.$page.errors).length > 0) {
            type = 'alert'
            message = (Object.keys(this.$page.errors).length === 1) ? 'Check form error.' :
              `Check ${Object.keys(this.$page.errors).length} form errors.`
            return this.notify(type, message)
          }

          if(this.$page.flash.error || this.$page.flash.alert) {
            type = 'alert'
            message = this.$page.flash.warning
            return this.notify(type, message)
          }

          if(this.$page.flash.warning) {
            type = 'warning'
            message = this.$page.flash.warning
            return this.notify(type, message)
          }

          if(this.$page.flash.info) {
            type = 'info'
            message = this.$page.flash.info
            return this.notify(type, message)
          }
        },
        deep: true,
      },
    },
    methods: {
      notify(type, message) {
        this.$awn[type](message)
      }
    }
  }
</script>

<style scoped>

</style>
