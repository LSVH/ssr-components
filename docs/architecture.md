# Architecture

SSR Components is designed with the following model in mind:

- Builder, takes care of rendering components, elements or strings.
    - Component, the main entry point for developers. This part of the system contains an Element and may contain a Style and/or Script.
        - Element, used for representing a DOM element.
            - Property, converts the properties of an element to a renderable string.
        - Style, used to customize the styling of the element with CSS.
        - Script, used to customize the interactivity of the element via JavaScript.

## Class diagram

The key philosophy for achieving and maintaining the model is the use of recursion. Have a look at the following diagram to help understand how this might work:

<div hidden>

```
@startuml classDiagram

class Builder {
    # children: string[]|Component[]|Element[]
    + renderElements(): string
    + renderStyles(): string
    + renderScripts(): string
}

class Component {
    # element: Element
    # style: Style
    # script: script
    + renderElement(): string
    + renderStyle(): string
    + renderScript(): string
}

class Element {
    # tag: string
    # props: Property[]
    + toString(): string
}

class Property {
    # name: string
    # value: string
    + toString(): string
    + getChildren(): Builder
}

class Style {
    # template: string
    # element: Element
    + toString(): string
    # elementChildrenStylesToString(): string
}

class Script {
    # template: string
    # element: Element
    + toString(): string
    # elementChildrenScriptsToString(): string
}

Builder ..> Component
Builder ..> Element
Component ..> Element
Component ..> Style
Component ..> Script
Element ..> Property
Property ..> Builder

@enduml
```

</div>

![](classDiagram.svg)
