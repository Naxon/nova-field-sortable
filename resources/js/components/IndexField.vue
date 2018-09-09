<template>
    <span>
        <a href="javascript:;" @click="reorderResource('up')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                    d="M0 16.67l2.829 2.83 9.175-9.339 9.167 9.339 2.829-2.83-11.996-12.17z"/></svg>
        </a>
        <a href="javascript:;" @click="reorderResource('down')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                    d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"/></svg>
        </a>
    </span>
</template>

<script>
    export default {
        props: ['resourceName', 'field'],

        methods: {
            async reorderResource(direction) {
                try {
                    const response = await this.reorderRequest(direction);

                    this.$toasted.show(
                        this.__('The new order has been set!'),
                        {type: 'success'}
                    );

                    this.$router.go(this.$router.currentRoute);
                } catch (error) {
                    this.$toasted.show(
                        this.__('An error occured while trying to reorder the resource.'),
                        {type: 'error'}
                    );
                }
            },

            reorderRequest(direction) {
                return Nova.request().patch(
                    `/naxon/nova-field-sortable/${this.resourceName}/${this.field.value}/reorder`,
                    {direction: direction}
                );
            },

            createFormData(direction) {
                return _.tap(new FormData(), formData => {
                    formData.append('direction', direction);
                });
            },
        }
    }
</script>
