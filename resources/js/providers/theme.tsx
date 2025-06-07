import { ThemeProvider as Theme } from 'next-themes';

type ThemeProviderProps = {
  children?: React.ReactNode;
};

export default function ThemeProvider({ children }: ThemeProviderProps) {
  return (
    <Theme enableSystem enableColorScheme defaultTheme="light" attribute="class">
      <main className="size-full min-h-dvh bg-neutral-200 text-neutral-950 dark:bg-neutral-900 dark:text-white">{children}</main>
    </Theme>
  );
}
