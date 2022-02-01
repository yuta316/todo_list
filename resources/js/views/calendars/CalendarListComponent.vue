<template>
    <div>
        <el-calendar v-model="value" >
            <template
                slot="dateCell"
                slot-scope="{data}">
                <span :class="data.isSelected ? 'is-selected' : ''">
                {{ data.day.split("-")[2] }}</span>
                <span v-for="task in taskGoalDay(data.day)" :key="task.id">
                    <router-link :to=" 'tasks/'+ task.id">
                        <el-button  round
                        type="primary" class="task">{{task.name}}</el-button>
                    </router-link>
                </span>
            </template>
        </el-calendar>
    </div>
</template>
<script>
export default {
    name: "CalendarListComponent",
    data() {
      return {
        tasks: [],
        value: new Date(),
        date: new Date(),
      }
    },
    methods: {
        getTask(){
            axios.get("/api/tasks") 
                .then((responnse) => {
                    this.tasks = responnse.data;
                })
        }
    },
    mounted() {
        this.getTask();
    },
    computed: {
        taskGoalDay: function() {
            return function(val){
                return this.tasks.filter(list => list.goal == val)
            }
        },
    }
}
</script>
<style scoped>
.task {
    max-width: 80%;
    font-size: 80%;
    overflow: hidden;
    text-align: center;
    margin: 2px;
    padding: 4px;
    white-space: nowrap;
text-overflow: ellipsis;
}
</style>

