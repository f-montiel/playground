<template>
    <div>
        <ul class="list-group">
            <li v-for="(job, index) in jobs" class="list-group-item" :class="{ active: job.completed }">
                <input type="checkbox" class="form-check-input" @click="changeJobStatus(index)" v-model="job.index">
                {{ job.name }}
                <button class="btn btn-sm btn-danger float-right" @click="delteJob(index)">
                    Borrar
                </button>
            </li>
        </ul>
    </div>
</template>

<script>
  export default {
    props: ['jobs'],
    data(){
        return {

        }
    },
    methods: {
            delteJob(index) {
                this.$emit('delete-job', index);
            },
            changeJobStatus(index) {
                this.$emit('change-job-status', index);
            }
        }
  }
</script>
