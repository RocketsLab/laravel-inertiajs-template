<template>
  <div class="p-6 min-h-screen flex justify-center items-center" :class="$app.theme.login.background">
    <div class="w-full max-w-md">
      <logo class="block mx-auto w-full max-w-xs fill-white" height="50" />
      <form class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden" @submit.prevent="submit">
        <div class="px-10 py-10 space-y-6">
          <h1 class="text-center font-bold text-3xl">Registrar-se</h1>
          <div class="mx-auto mt-6 w-24 border-b-2" />
          <text-input v-model="form.name" :errors="$page.errors.name" class="mt-10" label="Name" type="text" autofocus autocapitalize="off" />
          <text-input v-model="form.email" :errors="$page.errors.email" class="mt-10" label="Email" type="email" autofocus autocapitalize="off" />
          <text-input v-model="form.password" class="mt-6" label="Password" type="password" />
          <text-input v-model="form.password_confirmation" class="mt-6" label="Password confirm" type="password" />
        </div>
        <div class="px-10 py-4 bg-gray-100 border-t border-gray-200 flex justify-between items-center">
          <inertia-link :href="route('login')" class="hover:underline">Have account? Login!</inertia-link>
          <loading-button :loading="sending" class="btn-primary" type="submit">Register</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
  import LoadingButton from '@/components/LoadingButton'
  import Logo from '@/components/Logo'
  import TextInput from '@/components/TextInput'

  export default {
    metaInfo: { title: 'Register' },
    components: {
      LoadingButton,
      Logo,
      TextInput,
    },
    props: {
      errors: Object,
    },
    data() {
      return {
        sending: false,
        form: {
          name: '',
          email: '',
          password: '',
          password_confirmation: ''
        },
      }
    },
    methods: {
      submit() {
        this.sending = true
        this.$inertia.post(this.route('register.create'), {
          name: this.form.name,
          email: this.form.email,
          password: this.form.password,
          password_confirmation: this.form.password_confirmation
        }).then(() => this.sending = false)
      },
    },
  }
</script>
