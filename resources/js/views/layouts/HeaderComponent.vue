<template>
    <el-menu
        class="el-menu-vertical-demo"   
        background-color="#222222"
        text-color="#fff"
        active-text-color="#ffd04b"
        @open="handleOpen"
        @close="handleClose"
        :collapse="isCollapse"
        :router="routerMode"
    >
        <h3 style="color: #fff; text-align: center; padding-top: 30px;">
            <router-link :to="{ path: '/'}" style="color: #fff;">
                <i class="el-icon-s-claim"></i>
                タスク管理
            </router-link>
        </h3>
        <el-divider></el-divider>
        <el-submenu index="1">
            <template slot="title">
                <i class="el-icon-location"></i>
            <span>タスク管理</span>
            </template>
            <el-menu-item index="1" :route="{name: 'task.list'}">
                <i class="el-icon-folder-opened"></i>タスク一覧
            </el-menu-item>
            <el-menu-item index="2" :route="{ name: 'task.create' }">
                <i class="el-icon-edit"></i>タスクの追加
            </el-menu-item>
            <el-menu-item index="3" :route="{ name: 'calendar' }">
                <i class="el-icon-date"></i>カレンダー
            </el-menu-item>
            <el-menu-item index="4" disabled>Info</el-menu-item>
        </el-submenu>
        <el-divider></el-divider>
        <el-submenu index="2">
            <template slot="title"><i class="el-icon-user"></i>{{loginUser.name}}さんお疲れ様です</template>
            <el-menu-item index="4-1"><i class="el-icon-key"></i>マイページ</el-menu-item>
            <el-menu-item index="4-2">
            <form action="/logout" method="POST">
                <i class="el-icon-close"></i>
                <input name="_token" :value=csrf_token type="hidden">
                <button class="logout-btn">ログアウト</button></form>
            </el-menu-item>
            <el-menu-item index="4-3"><i class="el-icon-s-claim"></i>連絡</el-menu-item>
        </el-submenu>
        <el-divider></el-divider>
    </el-menu>
</template>

<script>
 export default {
    data(){
        return {
            loginUser: [],
            csrf_token: '',
            isCollapse: false,
            routerMode: true,
        }
    },
    methods: {
        getLoginUser(){
            axios.get('api/user')
                .then((response) => {
                    this.loginUser = response.data;
                });
        },
        handleOpen(key, keyPath) {
        console.log(key, keyPath);
      },
      handleClose(key, keyPath) {
        console.log(key, keyPath);
      }
    },
    mounted(){
        this.getLoginUser();
        this.csrf_token = document.getElementById('csrf').content;
    }
 }
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
.header {
    margin: 0;
    padding: 0;
    position: fixed;
    width: 100%;

    z-index: 999;
    &__title {
        font-size: 30px;
    }
}
.logout-btn {
    border: none;
    background-color: transparent;
}
.el-menu-vertical-demo{
    width: 200px;
    height: 100vh;
  }
</style>