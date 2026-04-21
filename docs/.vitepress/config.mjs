import { defineConfig } from "vitepress";

export default defineConfig({
  title: "Basekit Laravel UI",
  description: "A modular Laravel UI component library with Tailwind 4 theming",
  base: "/basekit-laravel-ui/",

  themeConfig: {
    nav: [
      { text: "Home", link: "/" },
      { text: "Guide", link: "/guide/installation" },
      { text: "Components", link: "/components" },
      {
        text: "GitHub",
        link: "https://github.com/basekit-laravel/basekit-laravel-ui",
      },
    ],

    sidebar: [
      {
        text: "Overview",
        items: [{ text: "Quick Reference", link: "/components" }],
      },
      {
        text: "Guide",
        items: [
          { text: "Installation", link: "/guide/installation" },
          { text: "Theming", link: "/guide/theming" },
          { text: "Performance", link: "/guide/performance" },
          { text: "Contributing", link: "/guide/contributing" },
        ],
      },
      {
        text: "Form Components",
        items: [
          { text: "Button", link: "/components/button" },
          { text: "Input", link: "/components/input" },
          { text: "Textarea", link: "/components/textarea" },
          { text: "Checkbox", link: "/components/checkbox" },
          { text: "Radio", link: "/components/radio" },
          { text: "Select", link: "/components/select" },
          { text: "Multi-Select", link: "/components/multi-select" },
          { text: "Toggle", link: "/components/toggle" },
        ],
      },
      {
        text: "Feedback Components",
        items: [
          { text: "Alert", link: "/components/alert" },
          { text: "Toast", link: "/components/toast" },
          { text: "Tooltip", link: "/components/tooltip" },
          { text: "Progress", link: "/components/progress" },
          { text: "Spinner", link: "/components/spinner" },
          { text: "Skeleton", link: "/components/skeleton" },
          { text: "Empty State", link: "/components/empty-state" },
        ],
      },
      {
        text: "Navigation Components",
        items: [
          { text: "Breadcrumb", link: "/components/breadcrumb" },
          { text: "Pagination", link: "/components/pagination" },
          { text: "Tabs", link: "/components/tabs" },
          { text: "Dropdown Menu", link: "/components/dropdown-menu" },
          { text: "Link", link: "/components/link" },
        ],
      },
      {
        text: "Layout Components",
        items: [
          { text: "Container", link: "/components/container" },
          { text: "Divider", link: "/components/divider" },
          { text: "Stack", link: "/components/stack" },
          { text: "Grid", link: "/components/grid" },
        ],
      },
      {
        text: "Display Components",
        items: [
          { text: "Card", link: "/components/card" },
          { text: "Badge", link: "/components/badge" },
          { text: "Avatar", link: "/components/avatar" },
          { text: "Table", link: "/components/table" },
          { text: "List", link: "/components/list" },
          { text: "Description List", link: "/components/description-list" },
          { text: "Stat", link: "/components/stat" },
        ],
      },
      {
        text: "Dialog Components",
        items: [
          { text: "Modal", link: "/components/modal" },
          { text: "Accordion", link: "/components/accordion" },
        ],
      },
      {
        text: "Other",
        items: [{ text: "Styleguide", link: "/components/styleguide" }],
      },
    ],

    socialLinks: [
      {
        icon: "github",
        link: "https://github.com/basekit-laravel/basekit-laravel-ui",
      },
    ],

    footer: {
      message: "Released under the MIT License.",
      copyright: "Copyright © 2026 Basekit",
    },
  },
});
