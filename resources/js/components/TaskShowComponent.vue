<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <form>
                    <div class="form-group row border-bottom">
                        <label for="title" class="col-sm-3 col-form-label">タスク名</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" :readonly="readStatus" id="title"
                            v-model="task.name">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="content" class="col-sm-3 col-form-label">詳細</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" :readonly="readStatus" id="content"
                            v-model="task.detail">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="content" class="col-sm-3 col-form-label">担当者</label>
                        <el-select v-model="task.user_id" placeholder="担当者を選択してください" id="user_id" :disabled="readStatus">
                            <el-option
                                v-for="user in users"
                                :key="user.id"
                                :label="user.name"
                                :value="user.id">
                            </el-option>
                        </el-select>
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="person-in-charge" class="col-sm-3 col-form-label">開始日</label>
                        <input type="date" class="col-sm-9 form-control-plaintext"  readonly id="person-in-charge"
                            v-model="task.created_at">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="person-in-charge" class="col-sm-3 col-form-label">終了日</label>
                        <input type="date" class="col-sm-9 form-control-plaintext" :readonly="readStatus" id="person-in-charge"
                            v-model="task.goal">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="status" class="col-sm-3 col-form-label">状態</label>
                        <el-select v-model="task.status" placeholder="状態を選択してください" id="status" :disabled="readStatus">
                            <el-option
                                v-for="s in status"
                                :key="s.id"
                                :label="s.status"
                                :value="s.status">
                            </el-option>
                        </el-select>
                    </div>
                </form>
            <el-button>
                <router-link :to="{ name: 'task.list' }">戻る</router-link>
            </el-button>
            <span v-if="readStatus==true">
                <el-button @click="readChange">
                    編集
                </el-button>
            </span>
            <span v-else>
                <el-button @click="readChange">
                    取り消し
                </el-button>
                <el-button @click="updateTask">
                    更新
                </el-button>
            </span>
            
            </div>
        </div>
    </div>
</template>
 
<script>
import moment from 'moment';
export default {
        props: {
            taskId: String
        },
        data() {
            return {
                task: {},
                users: {},
                readStatus: true,
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
                ],
            }
        },
        filters: {
        moment(date){
            return moment(date).format('YYYY/MM/DD');
        }
        },
        methods: {
            getTask(){
                axios.get('/api/tasks/' + this.taskId)
                    .then((response) => {
                        this.task = response.data;
                        this.task.created_at = new Date(this.task.created_at).getFullYear()
                             +"-"+ ("00" + (new Date(this.task.created_at).getMonth()+1)).slice(-2)
                             +"-"+ ("00" + new Date(this.task.created_at).getDate()).slice(-2) ;

                    })
            },
            getUserList(){
                axios.get("/api/users")
                    .then((response) => {
                        this.users = response.data
                    })
                    .catch(error => {
                        console.log(error);
                    });  
            },
            readChange(){
                this.readStatus = !this.readStatus;
                if(this.readStatus){
                    window.confirm("編集モードを終了しました")
                } else {
                    window.confirm("編集モードを開始します")
                }
            },
            updateTask(){
                let params = {
                    name: this.task.name,
                    detail: this.task.detail,
                    user_id: this.task.user_id,
                    goal: this.task.goal,
                    status: this.task.status,
                }
                console.log(this.task);
                axios.put('/api/tasks/' + this.task.id, params)
                    .then(() => {
                        window.confirm("更新が完了しました");
                        this.$router.push('/tasks');
                    })
                    .catch(error => {
                        window.confirm("更新が失敗しました");
                        console.log(error);
                    })
            }
        },
        mounted() {
            this.getTask();
            this.getUserList();
        }
    }
</script>