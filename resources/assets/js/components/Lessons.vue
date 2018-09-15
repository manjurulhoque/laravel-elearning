<template>
    <div class="container" style="color: black; font-weight: bold;">
        <h1 class="text-center">
            <button class="btn btn-primary" @click="createNewLesson()">
                Create New Lesson
            </button>
        </h1>
        <div class="">
            <ul class="list-group d-flex">
                <li class="list-group-item d-flex justify-content-between" v-for="lesson, key in lessons">
                    <p>{{ lesson.title }}</p>
                    <p>
                        <button class="btn btn-primary btn-xs" @click="editLesson(lesson)">
                            Edit
                        </button>
                        <button class="btn btn-danger btn-xs" @click="deleteLesson(lesson.id, key)">
                            Delete
                        </button>
                    </p>
                </li>
            </ul>
        </div>
        <create-lesson></create-lesson>
    </div>
</template>

<script>
    import axios from 'axios';
    import CreateLesson from './CreateLesson.vue';
    export default{
        props: ['default_lessons', 'series_id'],
        components: {
            CreateLesson
        },
        data() {
            return {
                lessons: JSON.parse(this.default_lessons)
            }
        },
        mounted() {
            this.$on('lesson_created', (lesson) => {
                this.lessons.push(lesson);
            });
            this.$on('lesson_updated', (lesson) => {
                let lessonIndex = this.lessons.findIndex(l => {
                    return lesson.id == l.id;
                });

                this.lessons.splice(lessonIndex, 1, lesson);
            })
        },
        methods: {
            createNewLesson() {
                this.$emit('create_new_lesson', this.series_id);
            },
            editLesson(lesson) {
                let seriesId = this.series_id;
                this.$emit('edit_lesson', { lesson, seriesId});
            },
            deleteLesson(id, key) {
                if (confirm("Are you sure you want to delete?") === true) {
                    axios.delete(`http://localhost:8000/admin/${this.series_id}/lessons/${id}`)
                        .then(res => {
                            this.lessons.splice(key, 1);
                        })
                }
            }
        }
    }
</script>