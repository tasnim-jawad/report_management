<template>
    <li :class="['dropdown-container', { active: isActive }]">
      <!-- Dropdown header -->
      <div class="menu" @click="handle_click">
        <p class="title">{{ title }}</p>
        <div class="icon">
          <i :class="isActive ? 'fa-solid fa-angle-up' : 'fa-solid fa-angle-down'"></i>
        </div>
      </div>
  
      <!-- Dropdown items -->
      <ul v-show="isActive" class="dropdown">
        <slot></slot>
      </ul>
    </li>
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
    computed: {
      isActive() {
        return this.active_dropdown === this.name;
        console.log(this.isActive);
        
      },
    },
    methods: {
      handle_click() {
        // Emit event to parent to set the active dropdown
        this.$emit("update_active", this.isActive ? null : this.name);
      },
    },
  };
  </script>
  
  <style scoped>
  .menu {
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: #f4f4f4;
  }
  
  .dropdown-container.active .menu {
    background-color: #d3d3d3;
  }
  
  .dropdown {
    list-style: none;
    padding: 0;
    margin: 0;
    border-left: 2px solid #ccc;
  }
  .dropdown {
    transition: max-height 0.3s ease-in-out;
    overflow: hidden;
    }

  </style>
  