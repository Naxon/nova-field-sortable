<template>
    <span>
        <a href="javascript:;" @click="reorderResource('up')" class="cursor-pointer text-70 hover:text-primary mr-3">
            <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-labelledby="up" role="presentation" class="fill-current">
                <path class="heroicon-ui" d="M13 5.41V21a1 1 0 0 1-2 0V5.41l-5.3 5.3a1 1 0 1 1-1.4-1.42l7-7a1 1 0 0 1 1.4 0l7 7a1 1 0 1 1-1.4 1.42L13 5.4z"/>
            </svg>
        </a>
        <a href="javascript:;" @click="reorderResource('down')" class="cursor-pointer text-70 hover:text-primary">
            <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-labelledby="down" role="presentation" class="fill-current">
                <path class="heroicon-ui" d="M11 18.59V3a1 1 0 0 1 2 0v15.59l5.3-5.3a1 1 0 0 1 1.4 1.42l-7 7a1 1 0 0 1-1.4 0l-7-7a1 1 0 0 1 1.4-1.42l5.3 5.3z"/>
            </svg>
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
                    `/nova-vendor/naxon/nova-field-sortable/${this.resourceName}/${this.field.value}/reorder`,
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
