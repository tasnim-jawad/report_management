<template>
    <div :class="['dropdown-container', { active: isActive }]">
      <!-- Dropdown header -->
      <div class="menu" @click="handle_click">
        <p class="title">{{ title }}</p>
        <div class="icon">
          <i :class="['fa-solid', { 'fa-angle-up': isActive, 'fa-angle-down': !isActive }]"></i>
        </div>
      </div>
  
      <!-- Dropdown items -->
      <transition name="dropdown">
        <ul v-if="isActive" class="dropdown">
          <slot></slot>
        </ul>
      </transition>      
    </div>
  </template>
  
  <script>
  export default {
    name: "SidebarDropdown",
    props: {
      title: {
        type: String,
        required: true,
      },
      active_dropdown: {
        type: [String, null], 
        required: true,
      },
      name: {
        type: String,
        required: true,
      },
    },
    data: () => ({
      active_icon: false,
    }),
    computed: {
      isActive() {
        return this.active_dropdown === this.name;
      },
    },
    methods: {
      handle_click() {
        // Emit event to parent to set the active dropdown
        this.$emit("update_active", this.isActive ? null : this.name);
        this.active_icon = this.isActive == true ? false : true;
        console.log("this.active_icon",this.active_icon);
        
        
      },
    },
  };
  </script>
  
<style>
  .menu {
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: var(--color3);
  }

  .dropdown-container.active .menu {
    background-color: var(--white);
  }

  .dropdown {
    list-style: none;
    padding: 0;
    margin: 0;
    border-left: 2px solid #ccc;
    overflow: hidden;
  }

  /* Dropdown Transition */
  .dropdown-enter-active,
  .dropdown-leave-active {
    transition: max-height 0.3s ease-in-out;
  }

  .dropdown-enter {
    max-height: 0;
  }

  .dropdown-enter-to {
    max-height: 300px; /* Adjust as needed */
  }

  .dropdown-leave-to {
    max-height: 0;
  }

</style>
  