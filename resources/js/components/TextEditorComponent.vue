<template>
    <div style="border: 0px solid pink;">
        <!-- formContent: {{ formContent }}<br /><br /> -->
        <!-- content: {{ content }}<br /><br /> -->
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

            <v-btn color="primary" class="" @click.prevent="openCreateLinkModal">
                <v-icon>mdi-link</v-icon>
            </v-btn>

            <v-btn color="dark" class="" @click="toggleShowHTML">
                <v-icon v-if="showHTML">mdi-eye</v-icon>
                <v-icon v-else>mdi-code-braces</v-icon>
            </v-btn>

            <v-row no-gutters class="justify-content-center my-2" v-if="selectedImageNode">
                <v-col cols="12">
                    <!-- <image-properties :selectedImageProps="selectedImageProps" @updateSelectedImageProperties="updateSelectedImageProperties" /> -->
                </v-col>
            </v-row>

            <div contenteditable="true" id="textBox" v-html="content" @focus="focused = true" @blur="focused = false" @click="selectElement" class="mt-1" v-if="!showHTML"></div>

            <div contenteditable="true" id="textBox" @focus="focused = true" @blur="focused = false" class="mt-1" v-else>
                <pre style="">{{ content }}</pre>
            </div>
        </v-form>

        <!-- <images-modal @insertImage="insertImage" @closeImagesModal="showImagesModal = false" v-if="showImagesModal" /> -->
        <!-- <create-link-modal :selectedText="selectedText" @insertLink="insertLink" @closeLinkModal="showCreateLinkModal = false" v-if="showCreateLinkModal" /> -->
    </div>
</template>

<script>
// import ImagesModal from '~/components/ImagesModal'
// import CreateLinkModal from './CreateLinkModal'
// import ImageProperties from '~/components/ImageProperties'
export default {
    components: {
        // ImagesModal,
        // CreateLinkModal,
        // ImageProperties
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
                style: {},
            },
            selectedText: '',
            focused: false,
            selRange: null,
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
            this.selectedImageNode = null
            console.log('selectElement: ', event)
            const element = event.target.tagName.toLowerCase()
            console.log('element: ', element)
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
        openImagesModal() {
            console.log('openImagesModal')
            this.showImagesModal = true
            setTimeout(() => {
                this.$bvModal.show('imagesModal')
            }, 300)
        },
        openDocumentsModal() {
            console.log('openDocumentsModal')
            this.showDocumentsModal = true
            setTimeout(() => {
                this.$bvModal.show('documentsModal')
            }, 300)
        },
        openCreateLinkModal() {
            console.log('openCreateLinkModal')
            this.selectedText = window.getSelection().toString() || 'Lien'
            this.selRange = this.saveSelection()
            this.showCreateLinkModal = true
            setTimeout(() => {
                this.$bvModal.show('createLinkModal')
            }, 300)
        },
        insertImage(filePath) {
            console.log('insertImage2: ', filePath)

            this.showModal = false
            // const image = 'http://dummyimage.com/160x90'
            const image = `/images/${filePath}`
            this.formatDoc('insertImage', image)
        },
        insertDocument(filePath, fileType, fileName) {
            console.log('insertDocument', filePath, fileType, fileName)
            this.formatDoc('insertHTML', `<a href="/documents/${filePath}" type="${fileType}" title="${fileName}" target="_blank">${fileName}</a>`)
        },
        insertLink({ linkType, linkPage }) {
            console.log('insertLink', linkType, linkPage)
            let link
            if (linkType === 'external') {
                link = `<a href="${linkPage.external}">${this.selectedText}</a>`
            } else {
                link = `<router-link to="/${linkPage.internal.slug}"><span class="link">${this.selectedText}</span></router-link>`
            }
            this.restoreSelection(this.selRange)
            document.getElementById('textBox').focus()
            this.insertTextAtCursor(link)
        },
        formatDoc(sCmd, sValue) {
            document.execCommand(sCmd, false, sValue)
        },
        // Insert link persist selection
        saveSelection() {
            if (window.getSelection) {
                let sel
                sel = window.getSelection()
                if (sel.getRangeAt && sel.rangeCount) {
                    return sel.getRangeAt(0)
                }
            } else if (document.selection && document.selection.createRange) {
                return document.selection.createRange()
            }
            return null
        },
        restoreSelection(range) {
            if (range) {
                if (window.getSelection) {
                    let sel
                    sel = window.getSelection()
                    sel.removeAllRanges()
                    sel.addRange(range)
                } else if (document.selection && range.select) {
                    range.select()
                }
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
    },
}
</script>

<style scoped>
#textBox {
    width: 100%;
    height: 250px;
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
