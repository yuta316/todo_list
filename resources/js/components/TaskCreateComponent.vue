<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <form>
                    <div class="form-group row border-bottom">
                        <label for="title" class="col-sm-3 col-form-label">*タスク名</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" id="title"
                        v-model="task.name">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="content" class="col-sm-3 col-form-label">*詳細</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" id="content"
                        v-model="task.detail">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="content" class="col-sm-3 col-form-label">担当者</label>
                        <el-select v-model="task.user_id" placeholder="担当者を選択してください" id="user_id">
                            <el-option
                                v-for="user in users"
                                :key="user.id"
                                :label="user.name"
                                :value="user.id">
                            </el-option>
                        </el-select>
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="person-in-charge" class="col-sm-3 col-form-label">*終了日</label>
                        <input type="date" class="col-sm-9 form-control-plaintext" id="person-in-charge"
                        v-model="task.goal">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="status" class="col-sm-3 col-form-label">状態</label>
                        <el-select v-model="task.status" placeholder="状態を選択してください" id="status">
                            <el-option
                                v-for="s in status"
                                :key="s.id"
                                :label="s.status"
                                :value="s.status">
                            </el-option>
                        </el-select>
                    </div>
                    <el-button @click="submitTask">タスク追加</el-button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                task: {},
                users: {},
                status: [
                    {
                        id:1,
                        status: "wait"
                    },
                    {
                        id:2,
                        status: "doing"
                    },{
                        id:3,
                        status: "done"
                    },
                ]
            }
        },
        methods: {
            submitTask(){
                axios.post("/api/tasks", this.task)
                    .then(() => {
                        window.confirm("タスクを追加しました");
                        this.$router.push("/tasks");
                    })
                    .catch(error => {
                        window.confirm("タスクを追加できませんでした");
                        console.log(error);
                    });  
            },
            getUserList(){
                axios.get("/api/users")
                    .then((response) => {
                        this.users = response.data
                    })
                    .catch(error => {
                        console.log(error);
                    });  
            }
        },
        mounted(){
            this.getUserList();
        }
    }
</script>