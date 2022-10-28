<script setup>
import useskills from '../../composables/skills';
import { onMounted } from 'vue';
const { skills, getSkills,destroySkill } = useskills();
onMounted(()=>getSkills());
</script>

<template>
    <div class="mt-12">
        <div class="flex justify-end m-2 p-2">
            <RouterLink
                :to="{name:'skillCreate'}"
                 class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded">Add Skill</RouterLink>
        </div>
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Slug
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="skill in skills"
                        :key="skill.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{skill.name}}
                        </th>
                        <td class="py-4 px-6">
                            {{skill.slug}}
                        </td>
                        <td class="py-4 px-6 space-x-2">
                            <RouterLink
                                :to="{name:'skillEdit',params:{id:skill.id}}"
                                class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded">Edit</RouterLink>
                            <button class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded" @click="destroySkill(skill.id)">Delete</button>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>

    </div>
</template>
