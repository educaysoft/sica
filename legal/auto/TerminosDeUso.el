(TeX-add-style-hook
 "TerminosDeUso"
 (lambda ()
   (TeX-add-to-alist 'LaTeX-provided-class-options
                     '(("scrartcl" "a4paper" "12pt" "draft")))
   (TeX-run-style-hooks
    "latex2e"
    "scrartcl"
    "scrartcl12")
   (LaTeX-add-labels
    "sec:terminos-de-uso"))
 :latex)

