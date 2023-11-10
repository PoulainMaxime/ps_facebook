import type { StorybookConfig } from '@storybook/vue-vite';

const config: StorybookConfig = {
  stories: [
    "../stories/**/*.stories.mdx",
    "../stories/**/*.stories.@(js|jsx|ts|tsx)"
  ],
  addons: [
    "@storybook/addon-links",
    "@storybook/addon-essentials",
    "@storybook/addon-knobs",
  ],
  presets: [
    "@storybook/preset-scss"
  ],
  staticDirs: ['./assets'],
  framework: {
    name: "@storybook/vue-vite",
    options: {}
  },
  docs: {
    autodocs: false,
  },
};

export default config;
