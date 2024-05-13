<template>
  <div class="tabs">
    <ul :class="{listClass, 'horizontal-tab': true}">
      <li v-for="(tab) in tabs" :class="itemClass">
        <a @click="selectTab(tab)"
           :class="[getNavLinkClass(tab), linkClass]">
          <span v-show="tab.name">{{ tab.name }}</span>
        </a>
      </li>
    </ul>
    <div :class="contentClass">
      <slot />
    </div>
  </div>
</template>

<script>
export default {
  name: "Tabs",
  props: {
    listClass: {
      required: false
    },
    linkClass: {
      required: false,
      default: 'nav-link',
    },
    itemClass: {
      default: 'nav-item',
      required: false,
    },
    contentClass: {
      default: 'tab-content',
      required: false
    }
  },
  data() {
    return { tabs: [] }
  },
  created() {
    this.tabs = this.$children
  },
  methods: {
    selectTab(selectedTab) {
      this.tabs.forEach(tab => tab.isActive = (tab.name == selectedTab.name))
    },
    getNavLinkClass({ isActive, count}) {
      return {'active': isActive, 'fy-center': count > 0}
    }
  }
}
</script>
