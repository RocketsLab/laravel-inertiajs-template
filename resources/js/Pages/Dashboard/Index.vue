<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Dashboard</h1>
    <p class="mb-12 leading-normal">RocketsLab / JETSistemas - Laravel + <a class="text-indigo-500 underline hover:text-orange-600" href="https://github.com/inertiajs">Inertia.js</a> application.</p>
    <div>
      <inertia-link class="btn-primary" href="/alert-success">Success Notify</inertia-link>
      <inertia-link class="btn-danger" href="/alert-error">Error notify</inertia-link>
      <inertia-link class="btn-secondary" href="/500">500 error</inertia-link>
      <inertia-link class="btn-outline" href="/404">404 error</inertia-link>
    </div>
  </div>
</template>

<script>
import Layout from '@/application/Layout'

export default {
  metaInfo: { title: 'Dashboard' },
  layout: Layout,
}
</script>
