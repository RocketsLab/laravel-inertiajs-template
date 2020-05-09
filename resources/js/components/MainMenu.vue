<template>
  <div>
    <div class="mb-4" v-for="menu in menus">
      <inertia-link class="flex items-center group py-2" :href="menu.route" key="menu.title">
        <icon :name="menu.icon" class="mr-2"
              :class="isUrl(menu.isUrl) ? 'menu-item-active' : 'menu-item'"/>
        <div :class="isUrl(menu.isUrl) ? 'menu-item-active' : 'menu-item'" v-text="menu.title"/>
      </inertia-link>
    </div>
  </div>
</template>

<script>
  import Icon from '@/components/Icon'

  export default {
    components: {
      Icon,
    },

    data() {
      return {
        menus: [
          {
            route: '/',
            icon: 'dashboard',
            title: 'Home',
            isUrl: ''
          },
        ]
      }
    },

    props: {
      url: String,
    },
    methods: {
      isUrl(...urls) {
        if (urls[0] === '') {
          return this.url === ''
        }

        return urls.filter(url => this.url.startsWith(url)).length
      },
    },
  }
</script>
