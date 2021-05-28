<template>
    <el-menu class="header"   mode="horizontal" >
        <div class="header__title"><i class="el-icon-s-claim"></i>タスク管理</div>
        <el-menu-item index="1">
            <!-- Listボタンへのリンク -->
            <router-link :to="{name: 'task.list'}">
                <el-button icon="el-icon-folder-opened" type="text">タスク一覧</el-button>
            </router-link>
        </el-menu-item>
        <el-menu-item index="2">
            <router-link :to="{ name: 'task.create' }">
                <el-button  icon="el-icon-edit" type="text">タスクの追加</el-button>
            </router-link>
            <!-- <el-menu-item index="2-1">item one</el-menu-item>
            <el-menu-item index="2-2">item two</el-menu-item>
            <el-menu-item index="2-3">item three</el-menu-item>
            <el-submenu index="2-4">
            <template slot="title">item four</template>
            <el-menu-item index="2-4-1">item one</el-menu-item>
            <el-menu-item index="2-4-2">item two</el-menu-item>
            <el-menu-item index="2-4-3">item three</el-menu-item> -->
            <!-- </el-submenu> -->
        </el-menu-item>
        <el-menu-item index="3">
            <router-link :to="{ name: 'calendar' }">
                <el-button icon="el-icon-date" type="text">カレンダー</el-button>
            </router-link>
        </el-menu-item>
        <el-menu-item index="4" disabled>Info</el-menu-item>
        <el-submenu index="5">
            <template slot="title"><i class="el-icon-user"></i>{{loginUser.name}}さんお疲れ様です</template>
            <el-menu-item index="4-1"><i class="el-icon-key"></i>マイページ</el-menu-item>
            <el-menu-item index="4-2"><i class="el-icon-close"></i>ログアウト</el-menu-item>
            <el-menu-item index="4-3"><i class="el-icon-s-claim"></i>連絡</el-menu-item>
        </el-submenu>
    </el-menu>
</template>

<script>
 export default {
    data(){
        return {
            loginUser: [],
        }
    },
    methods: {
        getLoginUser(){
            axios.get('api/user')
                .then((response) => {
                    this.loginUser = response.data;
                });
        }
    },
    mounted(){
        this.getLoginUser();
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
        margin:  20px 10% 0 10%;
    }
}
</style>