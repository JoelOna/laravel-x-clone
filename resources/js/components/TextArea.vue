<script setup>
  import Editor from '@tinymce/tinymce-vue'
  const props = defineProps({
        name: String,
        height: Number,
    })
    
</script>

<template>
  <main id="sample">
    <Editor
      api-key="zbk0qmrgl9xxq2do7pmd63tp4kk1odf3q8akef3an05a5ld7"
      :name="props.name"
      :init="{
        toolbar_mode: 'sliding',
        plugins: [
          // Core editing features
          'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
        ],
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
          { value: 'First.Name', title: 'First Name' },
          { value: 'Email', title: 'Email' },
        ],
        height: 300,
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
      }"
      initial-value="What are you thinking about?"
    />
  </main>
</template>