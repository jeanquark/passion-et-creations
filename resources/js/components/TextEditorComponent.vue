<template>
    <div style="border: 0px solid pink">
        <!-- formContent: {{ formContent }}<br /><br /> -->
        <!-- content: {{ content }}<br /><br /> -->
        <!-- selectedText: {{ selectedText }}<br /><br /> -->
        <!-- selRange: {{ selRange }}<br /><br /> -->
        range: {{ range }}<br /><br />
        <v-form>
            <v-btn color="primary" class="" @click.prevent="formatDoc('bold')">
                <v-icon>mdi-format-bold</v-icon>
            </v-btn>

            <v-btn color="primary" class="mx-.5" @click.prevent="formatDoc('italic')">
                <v-icon>mdi-format-italic</v-icon>
            </v-btn>

            <v-btn color="primary" class="mx-.5" @click.prevent="formatDoc('underline')">
                <v-icon>mdi-format-underline</v-icon>
            </v-btn>

            <v-btn color="primary" class="mx-.5" @click.prevent="formatDoc('justifyleft')">
                <v-icon>mdi-format-align-left</v-icon>
            </v-btn>

            <v-btn color="primary" class="mx-.5" @click.prevent="formatDoc('justifycenter')">
                <v-icon>mdi-format-align-center</v-icon>
            </v-btn>

            <v-btn color="primary" class="mx-.5" @click.prevent="formatDoc('justifyright')">
                <v-icon>mdi-format-align-right</v-icon>
            </v-btn>

            <v-btn color="primary" class="mx-.5" @click.prevent="formatDoc('insertUnorderedList')">
                <v-icon>mdi-format-bold</v-icon>
            </v-btn>

            <v-btn color="primary" class="mx-.5" @click.prevent="formatDoc('insertOrderedList')">
                <v-icon>mdi-format-list-bulleted</v-icon>
            </v-btn>

            <!-- <v-btn color="primary" class="" @click.prevent="openCreateLinkModal">
                <v-icon>mdi-link</v-icon>
            </v-btn> -->

            <v-btn color="primary" class="" @click.prevent="openImagesModal1">
                <v-icon>mdi-image</v-icon>
            </v-btn>
            <!-- <v-btn color="primary" class="" @click.prevent="openImagesModal2">
                <v-icon color="yellow">mdi-image</v-icon>
            </v-btn>
            <v-btn color="primary" class="" @click.prevent="openImagesModal3">
                <v-icon color="green">mdi-image</v-icon>
            </v-btn> -->

            <v-btn color="dark" class="" @click="toggleShowHTML">
                <v-icon v-if="showHTML">mdi-eye</v-icon>
                <v-icon v-else>mdi-code-braces</v-icon>
            </v-btn>

            <!-- <v-row no-gutters class="justify-content-center my-2" v-if="selectedImageNode">
                <v-col cols="12">
                    <image-properties :selectedImageProps="selectedImageProps" @updateSelectedImageProperties="updateSelectedImageProperties" />
                </v-col>
            </v-row> -->

            <div contenteditable="true" id="textBox" ref="textBox" v-html="content" @focus="focused = true" @blur="focused = false" @click="selectElement" class="mt-1" v-if="!showHTML"></div>

            <div contenteditable="true" id="textBox" ref="textBox" @focus="focused = true" @blur="focused = false" class="mt-1" v-else>
                <pre style="">{{ content }}</pre>
            </div>
        </v-form>

        <!-- <images-modal @insertImage="insertImage" @closeImagesModal="showImagesModal = false" v-if="showImagesModal" /> -->
        <!-- <create-link-modal :selectedText="selectedText" @insertLink="insertLink" @closeLinkModal="showCreateLinkModal = false" v-if="showCreateLinkModal" /> -->
        <v-dialog v-model="dialog" width="80%" v-if="option == 1">
            <medias-component @addFile="onAddImage1"></medias-component>
        </v-dialog>
        <v-dialog v-model="dialog" width="80%" v-if="option == 2">
            <medias-component @addFile="onAddImage2"></medias-component>
        </v-dialog>
        <v-dialog v-model="dialog" width="80%" v-if="option == 3">
            <medias-component @addFile="onAddImage3"></medias-component>
        </v-dialog>
        <v-dialog v-model="dialog" width="80%" v-if="option == 4">
            <medias-component @addFile="onAddImage4"></medias-component>
        </v-dialog>
        <v-dialog v-model="dialog" width="80%" v-if="option == 5">
            <medias-component @addFile="onAddImage5"></medias-component>
        </v-dialog>
    </div>
</template>

<script>
// import ImagesModal from '~/components/ImagesModal'
// import CreateLinkModal from './CreateLinkModal'
// import ImageProperties from '~/components/ImageProperties'
import MediasComponent from './MediasComponent'
const later = (delay, value) => new Promise(resolve => setTimeout(resolve, delay, value))
export default {
    components: {
        // ImagesModal,
        // CreateLinkModal,
        // ImageProperties
        MediasComponent
    },
    props: ['formContent'],
    created() {},
    mounted() {
        this.content = this.formContent
    },
    data() {
        return {
            content: '',
            showHTML: false,
            checked: false,
            showImagesModal: false,
            showDocumentsModal: false,
            showCreateLinkModal: false,
            selectedImageNode: null,
            selectedImageProps: {
                width: 0,
                height: 0,
                style: {}
            },
            selectedText: '',
            focused: false,
            selRange: null,
            dialog: false,
            option: 1,
            range: null
        }
    },
    computed: {},
    methods: {
        toggleShowHTML() {
            if (!this.showHTML) {
                this.content = document.getElementById('textBox').innerHTML
            } else {
                this.content = document.getElementById('textBox').innerText
            }
            this.showHTML = !this.showHTML
            this.$emit('toggleShowHTML', this.showHTML)
        },
        selectElement(event) {
            console.log('selectElement: ', event)
            this.selectedImageNode = null
            const element = event.target.tagName.toLowerCase()
            console.log('element: ', element)
            // console.log('element.selectionStart: ', element.selectionStart)
            if (element === 'img') {
                console.log('img!')
                this.selectedImageNode = event.target
                this.selectedImageProps['width'] = event.target.width
                this.selectedImageProps['height'] = event.target.height
                this.selectedImageProps['style']['margin-left'] = event.target.style['margin-left'] ? event.target.style['margin-left'].match(/\d/g).join('') : 0
                this.selectedImageProps['style']['margin-right'] = event.target.style['margin-right'] ? event.target.style['margin-right'].match(/\d/g).join('') : 0
                this.selectedImageProps['style']['float'] = event.target.style.float
            }
        },
        updateSelectedImageProperties(value, type) {
            console.log('updateSelectedImageProperties2: ', value, type)
            console.log('selectedImageNode: ', this.selectedImageNode)
            if (type === 'width' || type === 'height') {
                this.selectedImageNode[type] = value
            }
            if (type === 'marginLeft') {
                this.selectedImageNode.style.marginLeft = `${value}px`
            }
            if (type === 'marginRight') {
                this.selectedImageNode.style.marginRight = `${value}px`
            }
            if (type === 'float') {
                this.selectedImageNode.style.float = value
            }
        },
        openImagesModal1() {
            console.log('openImagesModal1')

            let sel, range, html
            if (window.getSelection) {
                sel = window.getSelection()
                if (sel.getRangeAt && sel.rangeCount) {
                    this.range = sel.getRangeAt(0)
                }
            } else if (document.selection && document.selection.createRange) {
                this.range = document.selection.createRange()
            }
            this.option = 3
            this.dialog = true

            this.option = 1
            this.dialog = true
        },
        openImagesModal2() {
            console.log('openImagesModal2')
            this.option = 2
            this.dialog = true
        },
        openImagesModal3() {
            console.log('openImagesModal3')

            let sel, range, html
            if (window.getSelection) {
                sel = window.getSelection()
                if (sel.getRangeAt && sel.rangeCount) {
                    this.range = sel.getRangeAt(0)
                }
            } else if (document.selection && document.selection.createRange) {
                this.range = document.selection.createRange()
            }
            this.option = 3
            this.dialog = true
        },
        openImagesModal4() {
            console.log('openImagesModal4')
            this.option = 4
            this.dialog = true
        },
        openImagesModal5() {
            console.log('openImagesModal5')
            this.option = 5
            this.dialog = true
        },
        onAddImage1(image) {
            try {
                console.log('onAddImage1 image: ', image)
                this.dialog = false
                
                let sel
                if (window.getSelection) {
                    sel = window.getSelection()
                    if (sel.getRangeAt && sel.rangeCount) {
                        this.range.deleteContents()

                        var el = document.createElement('div')
                        el.innerHTML = `<img src="/medias/${image.path}" width="100%" />`
                        var frag = document.createDocumentFragment(),
                            node,
                            lastNode
                        while ((node = el.firstChild)) {
                            lastNode = frag.appendChild(node)
                        }
                        this.range.insertNode(frag)

                        // Preserve the selection
                        if (lastNode) {
                            this.range = this.range.cloneRange()
                            this.range.setStartAfter(lastNode)
                            this.range.collapse(true)
                            sel.removeAllRanges()
                            sel.addRange(this.range)
                        }
                    }
                } else if (document.selection && document.selection.createRange) {
                    this.range.pasteHTML(`<img src="/medias/${image.path}" width="100%" />`)
                    this.range.select()
                }
            } catch (error) {
                console.log('error: ', error)
            }
        },
        onAddImage2(image) {
            try {
                console.log('onAddImage2 image: ', image)
                this.dialog = false
                this.$refs.textBox.focus()
                this.insertTextAtCursor(`<img src="/medias/${image.path}" width="100%" />`)
            } catch (error) {
                console.log('error: ', error)
            }
        },
        async onAddImage3(image) {
            try {
                console.log('onAddImage3 image3: ', image)
                this.dialog = false

                let sel
                if (window.getSelection) {
                    sel = window.getSelection()
                    if (sel.getRangeAt && sel.rangeCount) {
                        this.range.deleteContents()

                        var el = document.createElement('div')
                        el.innerHTML = `<img src="/medias/${image.path}" width="100%" />`
                        var frag = document.createDocumentFragment(),
                            node,
                            lastNode
                        while ((node = el.firstChild)) {
                            lastNode = frag.appendChild(node)
                        }
                        this.range.insertNode(frag)

                        // Preserve the selection
                        if (lastNode) {
                            this.range = this.range.cloneRange()
                            this.range.setStartAfter(lastNode)
                            this.range.collapse(true)
                            sel.removeAllRanges()
                            sel.addRange(this.range)
                        }
                    }
                } else if (document.selection && document.selection.createRange) {
                    this.range.pasteHTML(`<img src="/medias/${image.path}" width="100%" />`)
                    this.range.select()
                }
            } catch (error) {
                console.log('error: ', error)
            }
        },
        onAddImage4(image) {
            try {
                console.log('onAddImage3 image: ', image)
                this.dialog = false
                document.getElementById('textBox').focus()
                this.formatDoc('insertImage', `/medias${image.path}`)
            } catch (error) {
                console.log('error: ', error)
            }
        },
        onAddImage5(image) {
            try {
                // var sel = document.selection
                var sel = document.getElementById('textBox').focus()
                console.log('sel: ', sel)
                if (sel) {
                    var textRange = sel.createRange()
                    this.formatDoc('insertImage', false, 'http://jsfiddle.net/img/logo.png')
                    textRange.collapse(false)
                    textRange.select()
                } else {
                    this.formatDoc('insertImage', false, 'http://jsfiddle.net/img/logo.png')
                }
            } catch (error) {
                console.log('error: ', error)
            }
        },
        insertTextAtCursor(text) {
            let sel, range, html
            if (window.getSelection) {
                sel = window.getSelection()
                if (sel.getRangeAt && sel.rangeCount) {
                    range = sel.getRangeAt(0)
                    range.deleteContents()

                    var el = document.createElement('div')
                    el.innerHTML = text
                    var frag = document.createDocumentFragment(),
                        node,
                        lastNode
                    while ((node = el.firstChild)) {
                        lastNode = frag.appendChild(node)
                    }
                    range.insertNode(frag)

                    // Preserve the selection
                    if (lastNode) {
                        range = range.cloneRange()
                        range.setStartAfter(lastNode)
                        range.collapse(true)
                        sel.removeAllRanges()
                        sel.addRange(range)
                    }
                }
            } else if (document.selection && document.selection.createRange) {
                range = document.selection.createRange()
                range.pasteHTML(text)
                range.select()
            }
        },
        insertTextAtCursor2(myField, myValue) {
            //IE support
            if (document.selection) {
                myField.focus()
                sel = document.selection.createRange()
                sel.text = myValue
            }
            //MOZILLA and others
            else if (myField.selectionStart || myField.selectionStart == '0') {
                var startPos = myField.selectionStart
                var endPos = myField.selectionEnd
                myField.value = myField.value.substring(0, startPos) + myValue + myField.value.substring(endPos, myField.value.length)
            } else {
                myField.value += myValue
            }
        }
    }
}
</script>

<style scoped>
[contenteditable] {
    -webkit-user-select: text;
    user-select: text;
}
#textBox {
    width: 100%;
    height: 200px;
    border: 2px double #ccc;
    border-radius: 5px;
    padding: 12px;
    overflow-y: scroll;
}

#textBox #sourceText {
    padding: 0;
    margin: 0;
    min-width: 498px;
    min-height: 200px;
}

.overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    opacity: 0;
    transition: 0.5s ease;
    background-color: #008cba;
}

::v-deep #textBox img:hover {
    cursor: pointer;
    opacity: 0.5;
    transition: 0.5s ease;
    background-color: red;
}

::v-deep #textBox .link {
    color: #2c5cad;
}

::v-deep #textBox .link:hover {
    color: #1c3c70;
    text-decoration: underline;
}

#editMode label {
    cursor: pointer;
}

.intLink {
    cursor: pointer;
}

img.intLink {
    border: 1px solid #000;
}

.disabled:hover {
    cursor: not-allowed;
    color: #000;
}

pre {
    overflow-x: auto;
    white-space: pre-wrap;
    white-space: -moz-pre-wrap;
    white-space: -pre-wrap;
    white-space: -o-pre-wrap;
    word-wrap: break-word;
}
</style>
