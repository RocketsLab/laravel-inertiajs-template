<template>
  <div>
    <div class="mb-4" v-for="menu in $app.menus">
      <inertia-link class="flex items-center group py-2" :href="menu.route" key="menu.title">
        <icon :name="menu.icon" class="mr-2"
              :class="isUrl(menu.isUrl) ? $app.theme.menu.icons.active : $app.theme.menu.icons.default"/>
        <div :class="isUrl(menu.isUrl) ? $app.theme.menu.titles.active : $app.theme.menu.titles.default" v-text="menu.title"/>
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
