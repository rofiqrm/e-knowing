import { swalClasses } from '../../classes.js'
import { warn } from '../../utils.js'
import * as dom from '../../dom/index.js'

function handleBackdropParam (container, backdrop) {
  if (typeof backdrop === 'string') {
    container.style.background = backdrop
  } else if (!backdrop) {
    dom.addClass([document.documentElement, document.body], swalClasses['no-backdrop'])
  }
}

function handlePositionParam (container, position) {
  if (position in swalClasses) {
    dom.addClass(container, swalClasses[position])
  } else {
    warn('The "position" parameter is not valid, defaulting to "center"')
    dom.addClass(container, swalClasses.center)
  }
}

function handleGrowParam (container, grow) {
  if (grow && typeof grow === 'string') {
    const growClass = `grow-${grow}`
    if (growClass in swalClasses) {
      dom.addClass(container, swalClasses[growClass])
    }
  }
}

export const renderContainer = (instance, params) => {
  const container = dom.getContainer()

  if (!container) {
    return
  }

  handleBackdropParam(container, params.backdrop)

  if (!params.backdrop && params.allowOutsideClick) {
    warn('"allowOutsideClick" parameter requires `backdrop` parameter to be set to `true`')
  }

  handlePositionParam(container, params.position)
  handleGrowParam(container, params.grow)

  // Custom class
  dom.applyCustomClass(container, params, 'container')

  // Set queue step attribute for getQueueStep() method
  const queueStep = document.body.getAttribute('data-swal2-queue-step')
  if (queueStep) {
    container.setAttribute('data-queue-step', queueStep)
    document.body.removeAttribute('data-swal2-queue-step')
  }
}
