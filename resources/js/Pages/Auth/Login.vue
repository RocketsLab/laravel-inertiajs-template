<template>
  <div class="p-6 min-h-screen flex justify-center items-center" :class="$app.theme.login.background">
    <div class="w-full max-w-md">
      <logo class="block mx-auto w-full max-w-xs fill-white" height="50" />
      <form class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden" @submit.prevent="submit">
        <div class="px-10 py-10 space-y-6">
          <h1 class="text-center font-bold text-3xl">Bem-vindo!</h1>
          <div class="mx-auto mt-6 w-24 border-b-2" />
          <text-input v-model="form.email" :errors="$page.errors.email" class="mt-10" label="Email" type="email" autofocus autocapitalize="off" />
          <text-input v-model="form.password" class="mt-6" label="Password" type="password" />
          <label class="mt-6 select-none flex items-center" for="remember">
            <input id="remember" v-model="form.remember" class="mr-1" type="checkbox">
            <span class="text-sm">Remember Me</span>
          </label>
          <div>
            <a class="hover:underline" tabindex="-1" href="#reset-password">Forget password?</a>
          </div>
        </div>
        <div class="px-10 py-4 bg-gray-100 border-t border-gray-200 flex justify-between items-center">
          <inertia-link :href="route('register')" class="hover:underline">Don't have account? Register!</inertia-link>
          <loading-button :loading="sending" class="btn-primary" type="submit">Login</loading-button>
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
  metaInfo: { title: 'Login' },
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
        email: '',
        password: '',
        remember: null,
      },
    }
  },
  methods: {
    submit() {
      this.sending = true
      this.$inertia.post(this.route('login.attempt'), {
        email: this.form.email,
        password: this.form.password,
        remember: this.form.remember,
      }).then(() => this.sending = false)
    },
  },
}
</script>
