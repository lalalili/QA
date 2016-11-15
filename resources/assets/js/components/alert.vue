<template lang="jade">
    .alert-area(v-if='show')
      .alert(:class='typeClass')
        span(class='alert-close', @click='show=false') x
        i.fa.fa-info-circle.alert-icon(style='font-size: 16px;line-height: 20px;')
        .alert-text
          slot()
</template>
<script>
    export default {
        props: {
            type: {
                default: 'info'
            },
            show: {
                type: Boolean,
                default: true
            },
        },
        computed: {
            typeClass() {
                return 'alert-' + this.type;
            }
        }
    }
</script>

<style lang="stylus" scoped>
    .alert
        padding: 10px;
        &-area
            margin-bottom: 10px;
        &-icon
            width: 20px;
            display: inline-block;
            float: left;
        &-close
            cursor: pointer;
            float: right;
        &-text
            word-break: break-all;
            margin-left: 20px;
            margin-right: 10px;
        &-info
            background: #c7e0f2;
            color: #0082d5;
            border: 1px solid #0082d5;
        &-success
            background: #8AC48A;
        &-error
            background: red;
            color: white;
</style>