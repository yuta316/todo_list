<template>
    <div class="app-container">
        <el-row class="" :gutter="20">
            <draggable :options="options">
                <el-col :span="8">
                    <div 
                    class="box-card-wrapper bg-info" 
                    @drop="dropList($event, 'wait')"
                    @dragover.prevent
                    @dragenter.prevent>
                        <el-tag type="info" class="title-tag">Wait</el-tag>
                        <draggable :options="options">
                            <div v-for="task in wait" :key="task.id" @dragstart="dragList($event,task.id)">
                                <el-card class="box-card">
                                    <div slot="header" class="clearfix">
                                        <span>{{ task.name }}<el-tag type="info">{{ task.status }}</el-tag></span>
                                        <el-button style="float: right; padding: 3px 0" type="text" @click="handleClick(task.id)">詳細</el-button>
                                    </div>
                                    <el-tag>担当者</el-tag><div class="text item" v-if="task.user">{{ task.user.name }}</div>
                                    <el-tag type="success">期間</el-tag><div class="text item"> {{ task.created_at | moment}}~{{ task.goal | moment}}</div>
                                </el-card>
                            </div>
                        </draggable>
                    </div>
                </el-col>
                <el-col :span="8">
                    <div 
                    class="box-card-wrapper bg-info" 
                    @drop="dropList($event, 'doing')"
                    @dragover.prevent
                    @dragenter.prevent>
                        <el-tag type="danger" class="title-tag">Doing</el-tag>
                        <draggable :options="options">
                            <div v-for="task in doing" :key="task.id" @dragstart="dragList($event,task.id)">
                                <el-card class="box-card ">
                                    <div slot="header" class="clearfix">
                                        <span>{{ task.name }}<el-tag type="danger">{{ task.status }}</el-tag></span>
                                        <el-button style="float: right; padding: 3px 0" type="text" @click="handleClick(task.id)">詳細</el-button>
                                    </div>
                                    <el-tag>担当者</el-tag><div class="text item" v-if="task.user">{{ task.user.name }}</div>
                                    <el-tag type="success">期間</el-tag><div class="text item"> {{ task.created_at | moment}}~{{ task.goal | moment}}</div>
                                </el-card>
                            </div>
                        </draggable>
                    </div>
                </el-col>
                <el-col :span="8">
                    <div 
                    class="box-card-wrapper bg-info" 
                    @drop="dropList($event, 'done')"
                    @dragover.prevent
                    @dragenter.prevent>
                        <el-tag type="warning" class="title-tag">Done</el-tag>
                        <draggable :options="options">
                            <div v-for="task in done" :key="task.id" @dragstart="dragList($event,task.id)">
                                <el-card class="box-card">
                                    <div slot="header" class="clearfix">
                                        <span>{{ task.name }}<el-tag type="warning">{{ task.status }}</el-tag></span>
                                        <el-button style="float: right; padding: 3px 0" type="text" @click="handleClick(task.id)">詳細</el-button>
                                    </div>
                                    <el-tag>担当者</el-tag><div class="text item" v-if="task.user">{{ task.user.name }}</div>
                                    <el-tag type="success">期間</el-tag><div class="text item"> {{ task.created_at | moment}}~{{ task.goal | moment}}</div>
                                </el-card>
                            </div>
                        </draggable>
                    </div>
                </el-col>
            </draggable>
        </el-row>
    </div>
</template>
 
<script>
import draggable from "vuedraggable";
import moment from 'moment';
export default {
    components: {
        draggable,
    },
    filters: {
        moment(date){
            return moment(date).format('YYYY/MM/DD');
        }
    },
    data() {
        return {
            tasks: [],
            loginUser: [],
            options: {
                animations: 200,
            }
        }
    },
    methods: {
        getTasks(){
            axios.get('/api/tasks')
                .then((response) => {
                    this.tasks = response.data;
                });
        },
        handleClick(val){
            this.$router.push(`/tasks/${val}`);
        },
        dragList(event, dragId){
            event.dataTransfer.effectAlloed = 'move'
            event.dataTransfer.dropEffect = 'move'
            event.dataTransfer.setData('list-id',dragId)
        },
        dropList(event, category){
            const dragId = event.dataTransfer.getData('list-id')
            const dragList = this.tasks.find(list => list.id == dragId)
            console.log(dragList.id)
            dragList.status = category
            axios.put('/api/tasks/' + dragList.id, dragList)
                    .then(() => {
                    })
                    .catch(error => {
                        console.log(error);
                    })
        }
    },
    mounted(){
        this.getTasks()
    },
    computed: {
        wait(){
            return this.tasks.filter(list => list.status == "wait")
        },
        doing(){
            return this.tasks.filter(list => list.status == "doing")
        },
        done(){
            return this.tasks.filter(list => list.status == "done")
        },
    }
}
</script>

<style>
.title-tag {
    margin: 0 7%;
}

.box-card-wrapper {
    border-radius: 5%;
    padding: 10px 0;
}
.box-card {
    width: 86%;
    margin: 10px auto;
}
</style>